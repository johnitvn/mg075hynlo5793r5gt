<?php

use console\components\BaseMigration;

class m150910_114226_create_table_film_actor extends BaseMigration {

    public function up() {
        $this->createTable('film_actor', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull()->unique(),
            'birthday' => $this->integer(),
            'country_id' => $this->integer(),
            'profile' => $this->text(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
                ], $this->tableOptions);
        return true;
    }

    public function down() {
        $this->dropTable('film_actor');
        return true;
    }

}
