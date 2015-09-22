<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\FilmCategory */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="panel panel-default">
    <?php $form = ActiveForm::begin([
    'layout' => 'horizontal',
    'enableClientValidation' => true,
    ]); ?>
    <div class="panel-body">
        <div class="film-category-form">
                <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

   
        </div>
    </div>
    <div class="panel-footer">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
