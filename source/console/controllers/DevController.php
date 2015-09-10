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
class DevController extends Controller {

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

    public function actionSeed() {
        $this->seedUser();
    }

    private function seedUser() {
        for ($i = 1; $i < 20; $i++) {
            $employee = new Employee([
                'scenario' => 'create',
                'fullname' => $this->faker->name,
                'username' => "demo$i",
                'email' => $this->faker->email,
                'phone' => substr($this->faker->hexColor, 1) . substr($this->faker->hexColor, 1),
                'password' => 'demo' . $i,
                'confirm_password' => 'demo' . $i,
                'created_at' => time(),
                'updated_at' => time(),
            ]);
            $employee->save();
        }

        for ($i = 1; $i < 30; $i++) {
            $employee = new FilmCategory([
                'name' => $this->faker->name,
                'description' => $this->faker->address,
                'created_at' => time(),
                'updated_at' => time(),
            ]);
            $employee->save();
        }
    }

}
