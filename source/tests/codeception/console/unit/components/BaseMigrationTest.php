<?php

namespace console\components;

use Yii;
use console\components\BaseMigration;
use tests\codeception\console\unit\TestCase;

/**
 * Base class for all application migration
 *
 * @author john
 */
class BaseMigrationTest extends TestCase {

    protected function setUp() {
        parent::setUp();
    }

    public function testTableOptions() {
        $migration = new BaseMigration([
            'db' => [
                'class' => 'yii\db\Connection',
                'dsn' => 'mysql:host=127.0.0.1;dbname=ems-test',
                'username' => 'root',
                'password' => 'root',
            ],
        ]);

        $rp = new \ReflectionProperty(BaseMigration::className(), 'tableOptions');
        $rp->setAccessible(true);
        $tableOptions = $rp->getValue($migration);

        expect($tableOptions === "CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB")->true();
    }

}
