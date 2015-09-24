<?php

namespace backend\controllers;

use Yii;
use yii\web\Controller;

/**
 * Site controller
 * 
 */
class AppDocumentController extends Controller {

    public function actionIndex() {
        /* @var $appDoc backend\components\AppDocument */
        $appDoc = Yii::$app->get('appDoc');
        $categories = $appDoc->findAllCategories();
        return $this->render('index', [
                    'categories' => $categories,
        ]);
    }

    public function actionArticles($id) {
        /* @var $appDoc backend\components\AppDocument */
        $appDoc = Yii::$app->get('appDoc');
        $data = unserialize(base64_decode($id));
        return $this->render('articles', [
                    'categoryName' => $data['name'],
                    'isAvaiableInLanguage' => $appDoc->isAvaiableLanguage($data['path']),
                    'articles' => $appDoc->findAllArticles($data['path']),
        ]);
    }

    public function actionView($id) {
        /* @var $appDoc backend\components\AppDocument */
        $appDoc = Yii::$app->get('appDoc');
        $data = unserialize(base64_decode($id));
        $content = $appDoc->readArticle($data['path']);
        $this->view->title = $data['name'];
        $this->view->params['breadcrumbs'][] = ['label' => $data['categoryName'], 'url' => ['/app-document']];
        $this->view->params['breadcrumbs'][] = $data['name'];
        return $this->renderContent($content);
    }

}
