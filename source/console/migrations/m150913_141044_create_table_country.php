<?php

use console\components\BaseMigration;

class m150913_141044_create_table_country extends BaseMigration {

    public function up() {
        $this->createTable('country', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull()->unique(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
                ], $this->tableOptions);
        return true;
    }

    public function down() {
        $this->dropTable('country');
        return true;
    }

}
