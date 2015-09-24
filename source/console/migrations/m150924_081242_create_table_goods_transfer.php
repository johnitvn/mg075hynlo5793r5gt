<?php

use console\components\BaseMigration;

class m150924_081242_create_table_goods_transfer extends BaseMigration {

    public function up() {
        $this->createTable('goods_transfer', [
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
        $this->dropTable('goods_transfer');
        return true;
    }

}
