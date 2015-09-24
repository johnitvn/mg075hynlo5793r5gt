<?php

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Employee */

$this->title = Yii::t('app', 'Employees');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Employees'), 'url' => ['index']];
?>

<div class="employee-create">
    <?php
    $form = ActiveForm::begin([
                'layout' => 'horizontal',
                'enableClientValidation' => true,
    ]);
    ?>
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5><?= Yii::t('app', 'Create Employee') ?></h5>
        </div>
        <div class="ibox-content">
            <div class="employee-form">
                <?= $form->field($model, 'fullname')->textInput(['maxlength' => true]) ?>
                <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>            
                <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
                <?= $form->field($model, 'password')->passwordInput() ?>
                <?= $form->field($model, 'confirm_password')->passwordInput() ?>
            </div>
        </div>
        <div class="ibox-footer">
            <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success pull-right' : 'btn btn-primary pull-right']) ?>
            <?= Html::a('<span class="glyphicon glyphicon-menu-left"></span>' . Yii::t('app', 'Back'), Url::previous(), ['class' => 'btn btn-default']) ?>   
        </div>
    </div>
    <?php ActiveForm::end(); ?>
</div>
