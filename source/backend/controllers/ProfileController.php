<?php

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\helpers\Url;
use backend\models\form\ChangePasswordForm;
use backend\models\Employee;

/**
 * Sign controller
 */
class ProfileController extends Controller {

    public function actionIndex($id = null) {
        Url::remember();
        if ($id == null) {
            $myself = true;
            $model = Yii::$app->getUser()->getIdentity();
        } else {
            $myself = false;
            $model = Employee::findIdentity($id);
        }
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
