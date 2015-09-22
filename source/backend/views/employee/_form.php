<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Employee */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="panel panel-default">
    <?php
    $form = ActiveForm::begin([
                'layout' => 'horizontal',
                'enableClientValidation' => true,
    ]);
    ?>
    <div class="panel-body">
        <div class="employee-form">
            <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'fullname')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'gender')->textInput() ?>
            <?= $form->field($model, 'birthday')->textInput() ?>
            <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>            
        </div>
    </div>
    <div class="panel-footer">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
