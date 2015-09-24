<?php

use console\components\BaseMigration;

class m150924_065627_create_table_agency extends BaseMigration {

    public function up() {
        $this->createTable('agency', [
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
        $this->dropTable('agency');
        return true;
    }

}
