<?php

use console\components\BaseMigration;

class m150924_074107_create_table_cash_book extends BaseMigration {

    public function up() {
        $this->createTable('cash_book', [
            'id' => $this->primaryKey(),
            'type' => $this->smallInteger()->notNull(),
            'object_type' => $this->smallInteger()->notNull(),
            'object_id' => $this->integer()->notNull(),
            'amout' => $this->integer()->notNull(),
            'reason' => $this->text(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
                ], $this->tableOptions);
        return true;
    }

    public function down() {
        $this->dropTable('cash_book');
        return true;
    }

}
