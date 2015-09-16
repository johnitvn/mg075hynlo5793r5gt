<?php

use console\components\BaseMigration;

class m150916_105043_create_table_film_release_year extends BaseMigration {

    public function up() {
        $this->createTable('film_release_year', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull()->unique(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
                ], $this->tableOptions);
        return true;
    }

    public function down() {
        $this->dropTable('film_release_year');
        return true;
    }

}
