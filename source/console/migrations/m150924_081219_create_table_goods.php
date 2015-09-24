<?php

use console\components\BaseMigration;

class m150924_081219_create_table_goods extends BaseMigration {

    public function up() {
        $this->createTable('goods', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull()->unique(),
            'code' => $this->string()->notNull()->unique(),
            'goods_category_id' => $this->integer(),
            'selling_price' => $this->integer(),
            'short_desciprtion' => $this->text(),
            'desciprtion' => $this->text(),
            'image' => $this->string(),
            'meta_title' => $this->string(),
            'meta_keyword' => $this->string(),
            'meta_desciprtion' => $this->text(),
            'slug' => $this->string()->notNull(),
            'parent_id' => $this->integer()->notNull()->defaultValue(0),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
                ], $this->tableOptions);
        return true;
    }

    public function down() {
        $this->dropTable('goods');
        return true;
    }

}
