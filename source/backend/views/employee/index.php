<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Breadcrumbs;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\EmployeeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Employees');
$this->params['breadcrumbs'][] = $this->title;
?>

<?php $this->beginBlock('content-header') ?><div class="col-sm-8">
    <h2><?= Html::encode($this->title) ?></h2>
    <?= Breadcrumbs::widget(['links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : []]) ?></div>
<div class="col-sm-4">
    <div class="title-action">
        <?= Html::a('<span class="glyphicon glyphicon-plus"></span>' . Yii::t('app', 'Add New'), ['create'], ['class' => 'btn btn-primary']) ?>    </div>
</div>
<?php $this->endBlock() ?>

<div class="employee-index">
    <div class="panel panel-default">    
        <div class="panel-body"> 
            <form>
                <div class="input-group">
                    <input type="text" placeholder="<?= Yii::t('app', 'Search employee') ?>" class="input form-control" name="q" value="<?= isset($_GET['q']) ? $_GET['q'] : "" ?>">
                    <span class="input-group-btn">
                        <button type="submit" class="btn btn btn-primary"><i class = "fa fa-search"></i> <?= Yii::t('app', 'Search') ?></button>
                    </span>
                </div>
            </form>          
            <div class="table-responsive m-t">
                <?=
                GridView::widget([
                    'layout' => '{items}{pager}',
                    'dataProvider' => $dataProvider,
                    'pager' => [
                        'class' => yii\widgets\LinkPager::className(),
                        'firstPageLabel' => Yii::t('app', 'First'),
                        'lastPageLabel' => Yii::t('app', 'Last')
                    ],
                    'tableOptions' => ['class' => 'table table-striped table-hover'],
                    'columns' => [
                        'id',
                        [
                            'attribute' => 'avatar',
                            'value' => function($model) {
                                return '<img src="/img/default-avatar/28.jpg"/>';
                            },
                            'format' => 'raw',
                        ],
                        'fullname',
                        'username',
                        'email:email',
                        ['class' => 'backend\components\grid\ActionColumn'],
                    ],
                ]);
                ?>
            </div>
        </div>
    </div>
</div>
