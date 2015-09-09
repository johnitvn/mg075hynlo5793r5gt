<?php

namespace console\components;

use yii\db\Migration;
use yii\base\InvalidConfigException;

/**
 * Base class for all application migration
 *
 * @author john
 */
class BaseMigration extends Migration {

    protected $tableOptions;

    public function init() {
        parent::init();
        if ($this->db->driverName === 'mysql') {
            $this->tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        } else {
            throw new InvalidConfigException($this->db->driverName . " is not support");
        }
    }

}
