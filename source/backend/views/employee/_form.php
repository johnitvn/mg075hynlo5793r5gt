<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use \dmstr\bootstrap\Tabs;

/**
 * @var yii\web\View $this
 * @var backend\models\Employee $model
 * @var yii\widgets\ActiveForm $form
 */
?>
<div class="row">
    <div class="col-lg-8">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="employee-form">
                    <?php
                    $form = ActiveForm::begin([
                                'id' => 'Employee',
                                'layout' => 'horizontal',
                                'enableClientValidation' => true,
                                'errorSummaryCssClass' => 'error-summary alert alert-error'
                                    ]
                    );
                    ?>

                    <div class="">
                        <?php echo $form->errorSummary($model); ?>
                        <?= $form->field($model, 'fullname')->textInput(['maxlength' => true]) ?>
                        <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
                        <?= $form->field($model, 'password')->textInput(['maxlength' => true]) ?>
                        <?= $form->field($model, 'confirm_password')->textInput(['maxlength' => true]) ?>            
                        <hr/>
                        <?=
                        Html::submitButton(
                                '<span class="glyphicon glyphicon-check"></span> ' .
                                ($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Save')), [
                            'id' => 'save-' . $model->formName(),
                            'class' => 'btn btn-success'
                                ]
                        );
                        ?>

                        <?php ActiveForm::end(); ?>
                    </div>

                </div>

            </div>

        </div>
    </div>
</div>