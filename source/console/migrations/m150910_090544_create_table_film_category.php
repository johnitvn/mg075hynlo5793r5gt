<?php

use console\components\BaseMigration;

class m150910_090544_create_table_film_category extends BaseMigration {

    public function up() {
        $this->createTable('film_category', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull()->unique(),
            'description' => $this->string(255),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
                ], $this->tableOptions);
        return true;
    }

    public function down() {
        $this->dropTable('film_category');
        return true;
    }

}
