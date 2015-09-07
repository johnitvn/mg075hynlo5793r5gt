<?php

namespace common\components;

use Yii;
use yii\base\Component;

class MailWoker extends Component {

    public function init() {
        parent::init();
    }

    /**
     * 
     * @param string $from Email of employee create account
     * @param string $to Email of employee to send welcome email
     * @param string $link Link to active account
     */
    public function sendWelcomeEmployeeEmail($to, $link) {
        $params = Yii::$app->params;
        $body = Yii::$app->getView()->render('@common/mail/welcomeEmployee', [
            'link' => $link,
            'adminEmail' => $params['adminEmail'],
        ]);
        $content = Yii::$app->getView()->render('@common/mail/layouts/html', [
            'content' => $body,
        ]);
        return $this->sendPlainHtml($params['noreplyEmail'], $to, $params['welcomeEmployeeEmailSubject'], $content);
    }

    /**
     * 
     * @param string $from
     * @param string $to
     * @param string $subject
     * @param string $body
     * @return boolean Whether this message is sent successfully.
     */
    public function sendPlainHtml($from, $to, $subject, $body) {
        return Yii::$app->getMailer()->compose()
                        ->setFrom($from)
                        ->setTo($to)
                        ->setSubject($subject)
                        ->setHtmlBody($body)
                        ->send();
    }

    /**
     * Returns the mailer component.
     * @return \yii\mail\MailerInterface the mailer application component.
     */
    private function getMailer() {
        return Yii::$app->getMailer();
    }

}
