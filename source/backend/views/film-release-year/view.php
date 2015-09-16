<?php

use dmstr\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\Breadcrumbs;

/**
 * @var yii\web\View $this
 * @var backend\models\FilmReleaseYear $model
 */
$this->title = 'Film Release Year ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Film Release Years', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string) $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'View');
?>



<?php $this->beginBlock('content-header') ?>
<div class="col-sm-8">
    <h2><?= Html::encode($this->title) ?></h2>
    <?= Breadcrumbs::widget([ 'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : []]) ?>
</div>
<div class="col-sm-4">
    <div class="title-action">
        <?= Html::a('<span class="glyphicon glyphicon-pencil"></span> ' . Yii::t('app', 'Edit'), ['update', 'id' => $model->id], ['class' => 'btn btn-info']) ?>
        <?= Html::a('<span class="glyphicon glyphicon-list"></span> ' . Yii::t('app', 'List Countries'), ['index'], ['class' => 'btn btn-default']) ?>
    </div>
</div>
<?php $this->endBlock() ?>


<div class="giiant-crud film-release-year-view">


    <!-- flash message -->
    <?php if (\Yii::$app->session->getFlash('deleteError') !== null) : ?>
        <span class="alert alert-info alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
            <?= \Yii::$app->session->getFlash('deleteError') ?>
        </span>
    <?php endif; ?>

    <div class="panel panel-default">


        <div class="panel-body">
            <?=
            DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'id',
                    'name',
                    [
                        'attribute' => 'created_at',
                        'value' => date('d/m/Y H:i:s', $model->created_at),
                    ],
                    [
                        'attribute' => 'updated_at',
                        'value' => date('d/m/Y H:i:s', $model->created_at),
                    ],
                ],
            ]);
            ?>

            <?=
            Html::a('<span class="glyphicon glyphicon-trash"></span> ' . Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data-confirm' => '' . Yii::t('app', 'Are you sure to delete this item?') . '',
                'data-method' => 'post',
            ]);
            ?>



        </div>
    </div>
</div>