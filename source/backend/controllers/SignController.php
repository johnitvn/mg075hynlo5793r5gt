<?php

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use backend\models\LoginForm;

/**
 * Sign controller
 */
class SignController extends Controller {

    public $layout = "middle_box";

    /**
     * @inheritdoc
     */
    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [ 'actions' => ['in'], 'allow' => true,],
                    [ 'actions' => ['out'], 'allow' => true, 'roles' => ['@']],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [ 'out' => ['post']],
            ],
        ];
    }

    public function actionIn() {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('in', [
                        'model' => $model,
            ]);
        }
    }

    public function actionOut() {
        Yii::$app->user->logout();
        return $this->goHome();
    }

}
