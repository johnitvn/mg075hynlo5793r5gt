<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\widgets\Breadcrumbs;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model backend\models\Employee */

$this->title = Yii::t('app', 'Change Password');
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="employee-update">

    <div class="panel panel-default">
        <?php
        $form = ActiveForm::begin([
                    'layout' => 'horizontal',
                    'enableClientValidation' => true,
        ]);
        ?>
        <div class="panel-body">
            <div class="employee-form">
                <?= $form->field($model, 'old_password')->passwordInput() ?>
                <?= $form->field($model, 'new_password')->passwordInput() ?>
                <?= $form->field($model, 'confirm_password')->passwordInput() ?>
            </div>
        </div>
        <div class="panel-footer">
            <?= Html::submitButton(Yii::t('app', 'Update'), ['class' => 'btn btn-success']) ?>
        </div>
        <?php ActiveForm::end(); ?>
    </div>


</div>
