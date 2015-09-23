<?php

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\helpers\Url;
use backend\models\form\ChangePasswordForm;

/**
 * Sign controller
 */
class ProfileController extends Controller {

    public function actionIndex() {
        Url::remember();
        $model = Yii::$app->getUser()->getIdentity();
        return $this->render('index', ['model' => $model]);
    }

    public function actionChangePassword() {
        $model = new ChangePasswordForm();
        if ($model->load(Yii::$app->request->post()) && $model->changePassword()) {
            Yii::$app->user->logout();
            return $this->goHome();
        } else {
            return $this->render('change-password', [
                        'model' => $model,
            ]);
        }
    }

    public function actionUpdate() {
        $model = Yii::$app->getUser()->getIdentity();
        $model->setScenario("update");
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        } else {
            return $this->render('update', [
                        'model' => $model,
            ]);
        }
    }

}
