<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\Breadcrumbs;

/**
* @var yii\web\View $this
* @var yii\data\ActiveDataProvider $dataProvider
* @var backend\models\FilmReleaseYearSearch $searchModel
*/

$this->title = Yii::t('app', 'Film Release Years');
$this->params['breadcrumbs'][] = $this->title;

function urlCreator($action, $model, $key, $index) {
    // using the column name as key, not mapping to 'id' like the standard generator
    $params = is_array($key) ? $key : [$model->primaryKey()[0] => (string) $key];
    $params[0] = \Yii::$app->controller->id ? \Yii::$app->controller->id . '/' . $action : $action;
    return Url::toRoute($params);
}
?>

<?php $this->beginBlock('content-header') ?>
<div class="col-sm-8">
    <h2><?= Html::encode($this->title) ?></h2>
    <?= Breadcrumbs::widget([ 'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : []]) ?>
</div>
<div class="col-sm-4">
    <div class="title-action">
            <?= Html::a('<span class="glyphicon glyphicon-plus"></span> ' . Yii::t('app', 'New'), ['create'], ['class' => 'btn btn-success']) ?>
    </div>
</div>
<?php $this->endBlock() ?>
<div class="giiant-crud country-index">

    <?php \yii\widgets\Pjax::begin(['id' => 'pjax-main', 'enableReplaceState' => false, 'linkSelector' => '#pjax-main ul.pagination a, th a', 'clientOptions' => ['pjax:success' => 'function(){alert("yo")}']]) ?>
    <div class="panel panel-default">      
        <div class="panel-body">
            <form>
                <div class="input-group">
                    <input type="text" placeholder="Search year" class="input form-control" name="q" value="<?= isset($_GET['q']) ? $_GET['q'] : "" ?>">
                    <span class="input-group-btn">
                        <button type="submit" class="btn btn btn-primary"><i class = "fa fa-search"></i> Search</button>
                    </span>
                </div>
            </form>
            <div class="table-responsive m-t">
                <?=
                GridView::widget([
                    'layout' => '{summary}{pager}{items}{pager}',
                    'dataProvider' => $dataProvider,
                    'pager' => [
                        'class' => yii\widgets\LinkPager::className(),
                        'firstPageLabel' => Yii::t('app', 'First'),
                        'lastPageLabel' => Yii::t('app', 'Last')],
                    'tableOptions' => ['class' => 'table table-striped table-hover'],
                    'headerRowOptions' => ['class' => 'x'],
                    'columns' => [
                        'name',
                        [
                            'class' => 'yii\grid\ActionColumn',
                            'header' => 'Action',
                            'urlCreator' => 'urlCreator',
                            'contentOptions' => ['nowrap' => 'nowrap']
                        ],
                    ],
                ]);
                ?>
            </div>

        </div>

    </div>

    <?php \yii\widgets\Pjax::end() ?>


</div>




