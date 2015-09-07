<?php

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\base\UserException;
use yii\web\HttpException;
use yii\web\ErrorAction;

/**
 * Site controller
 */
class SiteController extends Controller {

    public function beforeAction($action) {
        if (!parent::beforeAction($action)) {
            return false;
        } else if ($action->id == "error") {
            $this->layout = "error";
        }
        return true;
    }

    public function actions() {
        return [
            'error' => [
                'class' => ErrorAction::className(),
            ]
        ];
    }

    public function actionIndex() {
        return $this->render('index');
    }

}
