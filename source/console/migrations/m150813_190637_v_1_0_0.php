<?php

use yii\db\Migration;

class m150813_190637_v_1_0_0 extends Migration {

    public function up() {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        $this->createTable('employee', [
            'id' => $this->primaryKey(),
            'username' => $this->string()->notNull()->unique(),
            'email' => $this->string()->notNull()->unique(),
            'avatar' => $this->string(32),
            'fullname' => $this->string()->notNull(),
            'gender' => $this->boolean(),
            'birthday' => $this->date(),
            'phone' => $this->string(16),
            'auth_key' => $this->string(32)->notNull(),
            'password_hash' => $this->string()->notNull(),
            'password_reset_token' => $this->string()->unique(),
            'status' => $this->smallInteger()->notNull()->defaultValue(10),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
                ], $tableOptions);
        return true;
    }

    public function down() {
        $this->dropTable('employee');
        return true;
    }

}
