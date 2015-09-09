<?php

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;

/**
 * Sign controller
 */
class SignController extends Controller {

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
                'actions' => [ 'logout' => ['post']],
            ],
        ];
    }

    public function actionIn() {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }
    }

    public function actionOut() {
        Yii::$app->user->logout();
        return $this->goHome();
    }

}
