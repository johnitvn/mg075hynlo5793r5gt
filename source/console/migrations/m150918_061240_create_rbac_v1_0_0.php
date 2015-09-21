<?php

use yii\db\Migration;

/**
 * Permissions tree
 * + admin_home: View all data  in home
 *   + traffic_overview: View trafic overview widget in home
 *
 * + admin_employee
 *   + create_employee
 *   + update_employee
 *   + delete_employee
 *   + block_employee
 *       + read_employee
 *
 * + admin_film_category
 *   + create_film_category
 *   + update_film_category
 *   + delete_film_category
 *       + read_film_category
 *
 * + admin_film_actor
 *   + create_film_actor
 *   + update_film_actor
 *      + update_own_film_actor
 *   + delete_film_actor
 *      + delete_own_film_actor
 *          + read_film_actor
 *
 * + admin_country
 *   + create_country
 *   + update_country
 *   + delete_country
 *       + read_country
 * 
 */
class m150918_061240_create_rbac_v1_0_0 extends Migration {

    public function up() {
        $auth = \Yii::$app->getAuthManager();

        /* ==== Home permistion  ===== */
        $traffic_overview = $auth->createPermission('traffic_overview');
        $traffic_overview->description = "View trafic overview widget in home";
        $auth->add($traffic_overview);

        $admin_home = $auth->createPermission('admin_home');
        $admin_home->description = "View all data  in home";
        $auth->add($admin_home);
        $auth->addChild($admin_home, $traffic_overview);


        /* ==== Employee permistion  ===== */
        $read_employee = $auth->createPermission('read_employee');
        $read_employee->description = "View list and detail employee";
        $auth->add($read_employee);

        $create_employee = $auth->createPermission('create_employee');
        $create_employee->description = "Create new employee";
        $auth->add($create_employee);
        $auth->addChild($create_employee, $read_employee);


        $update_employee = $auth->createPermission('update_employee');
        $update_employee->description = "Update new employee";
        $auth->add($update_employee);
        $auth->addChild($update_employee, $read_employee);

        $block_employee = $auth->createPermission('block_employee');
        $block_employee->description = "Block new employee";
        $auth->add($block_employee);
        $auth->addChild($block_employee, $read_employee);


        $delete_employee = $auth->createPermission('delete_employee');
        $delete_employee->description = "Delete employee";
        $auth->add($delete_employee);
        $auth->addChild($delete_employee, $read_employee);


        $admin_employee = $auth->createPermission('admin_employee');
        $admin_employee->description = "Manage employee";
        $auth->add($admin_employee);
        $auth->addChild($admin_employee, $delete_employee);
        $auth->addChild($admin_employee, $block_employee);
        $auth->addChild($admin_employee, $update_employee);
        $auth->addChild($admin_employee, $create_employee);


        /* ==== Film category permistion  ===== */
        $read_film_category = $auth->createPermission('read_film_category');
        $read_film_category->description = "View list and detail film category";
        $auth->add($read_film_category);

        $create_film_category = $auth->createPermission('create_film_category');
        $create_film_category->description = "Create film category";
        $auth->add($create_film_category);
        $auth->addChild($create_film_category, $read_film_category);

        $update_film_category = $auth->createPermission('update_film_category');
        $update_film_category->description = "Update film category";
        $auth->add($update_film_category);
        $auth->addChild($update_film_category, $read_film_category);

        $delete_film_category = $auth->createPermission('delete_film_category');
        $delete_film_category->description = "Delete film category";
        $auth->add($delete_film_category);
        $auth->addChild($delete_film_category, $read_film_category);

        $admin_film_category = $auth->createPermission('admin_film_category');
        $admin_film_category->description = "Manage film category";
        $auth->add($admin_film_category);
        $auth->addChild($admin_film_category, $delete_film_category);
        $auth->addChild($admin_film_category, $update_film_category);
        $auth->addChild($admin_film_category, $create_film_category);




        /* ==== Film actor permistion  ===== */
        $read_film_actor = $auth->createPermission('read_film_actor');
        $read_film_actor->description = "View list and detail film actor";
        $auth->add($read_film_actor);

        $create_film_actor = $auth->createPermission('create_film_actor');
        $create_film_actor->description = "Create film actor";
        $auth->add($create_film_actor);
        $auth->addChild($create_film_actor, $read_film_actor);


        $update_own_film_actor_rule = new \backend\rules\UpdateOwnFilmActor();
        $auth->add($update_own_film_actor_rule);

        $update_own_film_actor = $auth->createPermission('update_own_film_actor');
        $update_own_film_actor->description = "Update own film actor";
        $update_own_film_actor->ruleName = $update_own_film_actor_rule->name;
        $auth->add($update_own_film_actor);
        $auth->addChild($update_own_film_actor, $read_film_actor);

        $update_film_actor = $auth->createPermission('update_film_actor');
        $update_film_actor->description = "Update film actor";
        $auth->add($update_film_actor);
        $auth->addChild($update_film_actor, $update_own_film_actor);

        $delete_own_film_actor_rule = new \backend\rules\DeleteOwnFilmActor();
        $auth->add($delete_own_film_actor_rule);

        $delete_own_film_actor = $auth->createPermission('delete_own_film_actor');
        $delete_own_film_actor->description = "Delete own film actor";
        $delete_own_film_actor->ruleName = $delete_own_film_actor_rule->name;
        $auth->add($delete_own_film_actor);
        $auth->addChild($delete_own_film_actor, $read_film_actor);

        $delete_film_actor = $auth->createPermission('delete_film_actor');
        $delete_film_actor->description = "Delete film actor";
        $auth->add($delete_film_actor);
        $auth->addChild($delete_film_actor, $delete_own_film_actor);

        $admin_film_actor = $auth->createPermission('admin_film_actor');
        $admin_film_actor->description = "Manage film actor";
        $auth->add($admin_film_actor);
        $auth->addChild($admin_film_actor, $delete_film_actor);
        $auth->addChild($admin_film_actor, $update_film_actor);
        $auth->addChild($admin_film_actor, $create_film_actor);


        /* ==== Country permistion  ===== */
        $read_country = $auth->createPermission('read_country');
        $read_country->description = "View list and detail country";
        $auth->add($read_country);

        $create_country = $auth->createPermission('create_country');
        $create_country->description = "Create new country";
        $auth->add($create_country);
        $auth->addChild($create_country, $read_country);


        $update_country = $auth->createPermission('update_country');
        $update_country->description = "Update new country";
        $auth->add($update_country);
        $auth->addChild($update_country, $read_country);


        $delete_country = $auth->createPermission('delete_country');
        $delete_country->description = "Delete country";
        $auth->add($delete_country);
        $auth->addChild($delete_country, $read_country);


        $admin_country = $auth->createPermission('admin_country');
        $admin_country->description = "Manage country";
        $auth->add($admin_country);
        $auth->addChild($admin_country, $delete_country);
        $auth->addChild($admin_country, $update_country);
        $auth->addChild($admin_country, $create_country);


        $administrator = $auth->createRole("administrator");
        $administrator->description = "Have fully permissions";
        $auth->add($administrator);
        $auth->addChild($administrator, $admin_home);
        $auth->addChild($administrator, $admin_employee);
        $auth->addChild($administrator, $admin_country);
        $auth->addChild($administrator, $admin_film_actor);
        $auth->addChild($administrator, $admin_film_category);

        $editor = $auth->createRole("editor");
        $editor->description = "Have manage content permissions";
        $auth->add($editor);
        $auth->addChild($editor, $admin_home);
        $auth->addChild($editor, $admin_country);
        $auth->addChild($editor, $admin_film_actor);
        $auth->addChild($editor, $admin_film_category);

        $collaborator = $auth->createRole("collaborator");
        $collaborator->description = "Have manage own content permissions";
        $auth->add($collaborator);
        $auth->addChild($collaborator, $create_film_actor);
        $auth->addChild($collaborator, $update_own_film_actor);
        $auth->addChild($collaborator, $delete_own_film_actor);
    }

    public function down() {
        $auth = \Yii::$app->getAuthManager();
        $auth->removeAllRoles();
        $auth->removeAllRules();
        $auth->removeAllPermissions();
        return true;
    }

}
