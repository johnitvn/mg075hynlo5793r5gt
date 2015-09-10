<?php

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;

/**
 * @var yii\web\View $this
 * @var backend\models\FilmCategory $model
 */
$this->title = 'Film Category ' . $model->name . ', ' . Yii::t('app', 'Edit');
$this->params['breadcrumbs'][] = ['label' => 'Film Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string) $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Edit');
?>

<?php $this->beginBlock('content-header') ?>
<div class="col-sm-8">
    <h2><?= Html::encode($this->title) ?></h2>
    <?= Breadcrumbs::widget([ 'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : []]) ?>
</div>
<div class="col-sm-4">
    <div class="title-action">
        <?= Html::a(Yii::t('app', 'Cancel'), \yii\helpers\Url::previous(), ['class' => 'btn btn-default']) ?>
    </div>
</div>
<?php $this->endBlock() ?>


<div class="giiant-crud film-category-update">


    <?php
    echo $this->render('_form', [
        'model' => $model,
    ]);
    ?>

</div>
