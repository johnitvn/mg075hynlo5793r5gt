<?php

namespace tests\codeception\common\unit\components;

use tests\codeception\backend\unit\TestCase;
use common\components\MailWoker;
use Yii;

class MailWokerTest extends TestCase {

    const File_Transpot_Path = '@tests/codeception/config/runtime/mail/workertest';
    const Admin_Email = 'admin@email.com';
    const Noreply_Email = 'noreply@email.com';
    const Welcome_Employee_Email_Subject = 'WelcomeEmployeeEmailSubject';

    protected function setUp() {
        parent::setUp();
        Yii::configure(Yii::$app, [
            'components' => [
                'mailWorker' => [
                    'class' => MailWoker::className(),
                ],
                'mailer' => [
                    'class' => 'yii\swiftmailer\Mailer',
                    'useFileTransport' => true,
                    'fileTransportPath' => self::File_Transpot_Path,
                ],
            ],
            'params' => [
                'adminEmail' => self::Admin_Email,
                'noreplyEmail' => self::Noreply_Email,
                'welcomeEmployeeEmailSubject' => self::Welcome_Employee_Email_Subject,
            ]
        ]);
    }

    public function _after() {
        foreach ($this->getAllEmailFiles() as $file) {
            if (is_file($file)) {
                @unlink($file);
            }
        }
    }

    public function testSendPlainHtml() {
        $result = Yii::$app->get("mailWorker")->sendPlainHtml('from@mail.com', 'to@mail.com', 'Test Subject', '<html>Test Body</html>');

        // Ensure able to send email and only send one email
        expect($result)->true();
        expect(count($this->getAllEmailFiles()) === 1)->true();

        // check content of email
        $email = file_get_contents($this->getAllEmailFiles()[0]);
        $emailParsed = $this->parserEmailFile($email);


        expect($emailParsed['body'])->equals('<html>Test Body</html>');
        expect($emailParsed['headers']['From'])->equals('from@mail.com');
        expect($emailParsed['headers']['To'])->equals('to@mail.com');
        expect($emailParsed['headers']['Subject'])->equals('Test Subject');
    }

    public function testSendWelcomeEmployeeEmail() {
        $result = Yii::$app->get("mailWorker")->sendWelcomeEmployeeEmail('to@mail.com', '{{link}}');
        expect($result)->true();
        expect(count($this->getAllEmailFiles()) === 1)->true();

        $email = file_get_contents($this->getAllEmailFiles()[0]);
        $emailParsed = $this->parserEmailFile($email);


        expect($emailParsed['headers']['From'])->equals(self::Noreply_Email);
        expect($emailParsed['headers']['To'])->equals('to@mail.com');
        expect($emailParsed['headers']['Subject'])->equals(self::Welcome_Employee_Email_Subject);

        expect(strpos($emailParsed['body'], '{{link}}') !== false)->true();
        expect(strpos($emailParsed['body'], self::Admin_Email) !== false)->true();
    }

    private function parserEmailFile($email) {
        $result = explode("\n\n", str_replace(array("\r\n", "\n\r", "\r"), "\n", $email), 2);

        $headers = [];
        foreach (explode("\n", $result[0])as $headerRaw) {
            if (empty($headerRaw = trim($headerRaw))) {
                continue;
            }
            $header = explode(": ", $headerRaw);
            $headers[$header[0]] = trim($header[1]);
        }
        return ['headers' => $headers, 'body' => $result[1]];
    }

    function getAllEmailFiles() {
        return glob(Yii::getAlias(self::File_Transpot_Path) . '/*');
    }

}
