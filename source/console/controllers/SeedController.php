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
    private $seed_category = [
        "Phim hành động",
        "Phim võ thuật",
        "Phim tâm lý",
        "Phim hài hước",
        "Phim hoạt hình",
        "Phim phiêu lưu",
        "Phim kinh dị",
        "Phim hình sự",
        "Phim chiến tranh",
        "Phim thần thoại",
        "Phim viễn tưởng",
        "Phim cổ trang",
        "Phim khoa học tài liệu",
        "Phim âm nhạc",
        "Phim TV Show",
        "Anime",
        "Phim Hàn Quôc",
        "Phim chiếu rạp",
        "Phim thuyết minh",
        "Cao bồi",
    ];

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
                'fullname' => 'Demo So ' . $index,
                'username' => "demo$index",
                'email' => "demo$index@gmail.com",
                'phone' => 'demo',
                'password' => "demo$index",
                'confirm_password' => "demo$index",
                'gender' => Employee::MALE,
                'created_by' => 0,
                'updated_by' => 0,
                'created_at' => time(),
                'updated_at' => time(),
            ]);
            if ($employee->save()) {
                $auth = \Yii::$app->getAuthManager();
                if (($index % 2) == 0) {
                    $auth->assign($auth->getRole('editor'), $employee->id);
                } else {
                    $auth->assign($auth->getRole('collaborator'), $employee->id);
                }
            }
        }

        foreach ($this->seed_category as $cat) {
            $category = new FilmCategory([
                'name' => $cat,
                'description' => '',
                'created_at' => time(),
                'updated_at' => time(),
            ]);
            $category->save();
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
        $auth->assign($auth->getRole('administrator'), $employee->id);


        foreach ($this->seed_category as $cat) {
            $category = new FilmCategory([
                'name' => $cat,
                'description' => '',
                'created_at' => time(),
                'updated_at' => time(),
            ]);
            $category->save();
        }
    }

}
