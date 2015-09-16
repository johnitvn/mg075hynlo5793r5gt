<?php

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;

/**
 * @var yii\web\View $this
 * @var backend\models\FilmReleaseYear $model
 */
$this->title = Yii::t('app', 'Create');
$this->params['breadcrumbs'][] = ['label' => 'Film Release Years', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
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


<div class="giiant-crud  film-release-year-create">

    <?=
    $this->render('_form', [
        'model' => $model,
    ]);
    ?>

</div>



