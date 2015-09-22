<?php

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model backend\models\FilmActor */

$this->title = Yii::t('app', 'Create Film Actor');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Film Actors'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<?php $this->beginBlock('content-header') ?><div class="col-sm-8">
    <h2><?= Html::encode($this->title) ?></h2>
    <?= Breadcrumbs::widget([ 'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : []]) ?></div>
<div class="col-sm-4">
    <div class="title-action">
        <?= Html::a('<span class="glyphicon glyphicon-menu-left"></span>' . Yii::t('app', 'Back'), Url::previous(), ['class' => 'btn btn-default']) ?>    </div>
</div>
<?php $this->endBlock() ?>

<div class="film-actor-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
