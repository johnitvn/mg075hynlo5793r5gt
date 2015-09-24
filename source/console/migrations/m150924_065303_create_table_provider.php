<?php

use console\components\BaseMigration;

class m150924_065303_create_table_provider extends BaseMigration {

    public function up() {
        $this->createTable('provider', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull()->unique(),
            'phone' => $this->string()->notNull(),
            'address' => $this->text(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
                ], $this->tableOptions);
        return true;
    }

    public function down() {
        $this->dropTable('provider');
        return true;
    }

}
