<?php

use console\components\BaseMigration;

class m150924_081210_create_table_goods_category extends BaseMigration {

    public function up() {
        $this->createTable('goods_category', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull()->unique(),
            'slug' => $this->string()->notNull(),
            'parent_id' => $this->integer()->notNull()->defaultValue(0),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
                ], $this->tableOptions);
        return true;
    }

    public function down() {
        $this->dropTable('goods_category');
        return true;
    }

}
