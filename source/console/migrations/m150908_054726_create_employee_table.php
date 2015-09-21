<?php

use console\components\BaseMigration;

class m150908_054726_create_employee_table extends BaseMigration {

    public function up() {
        $this->createTable('employee', [
            'id' => $this->primaryKey(),
            'username' => $this->string()->notNull()->unique(),
            'email' => $this->string()->notNull()->unique(),
            'avatar' => $this->string(32),
            'fullname' => $this->string()->notNull(),
            'gender' => $this->boolean(),
            'birthday' => $this->integer()->defaultValue(NULL),
            'phone' => $this->string(16),
            'auth_key' => $this->string(32)->notNull(),
            'password_hash' => $this->string()->notNull(),
            'password_reset_token' => $this->string()->unique(),
            'status' => $this->smallInteger()->notNull()->defaultValue(10),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
                ], $this->tableOptions);
        return true;
    }

    public function down() {
        $this->dropTable('employee');
        return true;
    }

}
