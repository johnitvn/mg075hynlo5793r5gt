<?php

namespace backend\controllers;

use Yii;
use backend\models\Employee;
use backend\models\search\EmployeeSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Url;
use backend\models\form\AssignForm;

/**
 * EmployeeController implements the CRUD actions for Employee model.
 */
class EmployeeController extends Controller {

    /**
     * @param Action $action the action to be executed.
     * @return boolean
     */
    public function beforeAction($action) {
        if (!parent::beforeAction($action) || !Yii::$app->getUser()->can('read_employee')) {
            return false;
        }
        return true;
    }

    public function behaviors() {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Employee models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new EmployeeSearch();
        $dataProvider = $searchModel->search(isset($_GET['q']) ? $_GET['q'] : null);

        Url::remember();
        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Employee model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Employee model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new Employee();
        $model->setScenario("create");
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Employee model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);
        $model->setScenario("update");
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Employee model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $model = $this->findModel($id);
        $model->setScenario('change_status');
        $model->delete();
        return $this->redirect(Url::previous());
    }

    /**
     * Finds the Employee model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Employee the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Employee::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionAssign($id) {
        $model = new AssignForm($id);
        if ($model->load($_POST) && $model->assign()) {
            return $this->redirect(['view', 'id' => $id]);
        } else {
            return $this->render('assign', [
                        'model' => $model,
            ]);
        }
    }

    public function actionBlock($id) {
        $model = $this->findModel($id);
        $model->setScenario('change_status');
        $model->status = Employee::STATUS_BLOCKED;
        $model->save();
        return $this->redirect(['view', 'id' => $model->id]);
    }

    public function actionUnblock($id) {
        $model = $this->findModel($id);
        $model->setScenario('change_status');
        $model->status = Employee::STATUS_ACTIVE;
        $model->save();
        return $this->redirect(['view', 'id' => $model->id]);
    }

}
