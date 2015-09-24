<?php

namespace console\controllers;

use yii\console\Controller;
use backend\models\Employee;
use backend\models\FilmCategory;

/**
 * Manager Employee
 *
 * @author john
 */
class SeedController extends Controller {

    private $faker;

    public function init() {
        parent::init();
        $faker = $faker = \Faker\Factory::create();
        $faker->addProvider(new \Faker\Provider\en_US\Person($faker));
        $faker->addProvider(new \Faker\Provider\en_US\Address($faker));
        $faker->addProvider(new \Faker\Provider\en_US\PhoneNumber($faker));
        $faker->addProvider(new \Faker\Provider\en_US\Company($faker));
        $faker->addProvider(new \Faker\Provider\Lorem($faker));
        $faker->addProvider(new \Faker\Provider\Internet($faker));
        $this->faker = $faker;
    }

    public function beforeAction($action) {
        if (!parent::beforeAction($action) || !substr(gethostname(), strlen(gethostname()) - 6) == ".local") {
            return false;
        }
        return true;
    }

    public function actionDev() {
        $this->actionProd();
        for ($index = 0; $index < 27; $index++) {
            $employee = new Employee([
                'scenario' => 'create',
                'fullname' => 'Demo No ' . $index,
                'username' => "demo$index",
                'email' => "demo$index@gmail.com",
                'phone' => '09123456789',
                'password' => "demo$index",
                'confirm_password' => "demo$index",
                'gender' => Employee::MALE,
                'created_by' => 0,
                'updated_by' => 0,
                'created_at' => time(),
                'updated_at' => time(),
            ]);
        }
    }

    public function actionProd() {
        $employee = new Employee([
            'scenario' => 'create',
            'fullname' => 'John Martin',
            'username' => "johnm",
            'email' => 'john.itvn@gmail.com',
            'phone' => '0986804874',
            'password' => 'John1621993',
            'confirm_password' => 'John1621993',
            'gender' => Employee::MALE,
            'created_by' => 0,
            'updated_by' => 0,
            'created_at' => time(),
            'updated_at' => time(),
        ]);
        $employee->save();

        $auth = \Yii::$app->getAuthManager();
    }

}
