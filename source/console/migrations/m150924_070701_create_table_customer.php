<?php

use console\components\BaseMigration;

class m150924_070701_create_table_customer extends BaseMigration {

    public function up() {
        $this->createTable('customer', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull()->unique(),
            'phone' => $this->string()->notNull(),
            'email' => $this->string(255),
            'birthday' => $this->text(),
            'address' => $this->text(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
                ], $this->tableOptions);
        return true;
    }

    public function down() {
        $this->dropTable('customer');
        return true;
    }

}
