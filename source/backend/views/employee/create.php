<?php

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use yii\bootstrap\ActiveForm;

/**
 * @var yii\web\View $this
 * @var backend\models\Employee $model
 */
$this->title = Yii::t('app', 'Create');
$this->params['breadcrumbs'][] = ['label' => 'Employees', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="giiant-crud employee-create">
    <?php $this->beginBlock('content-header') ?>
    <div class="col-sm-8">
        <h2><?= Html::encode($this->title) ?></h2>
        <?= Breadcrumbs::widget([ 'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : []]) ?>
    </div>
    <div class="col-sm-4">
        <div class="title-action">
            <?= Html::a(Yii::t('app', 'Back'), \yii\helpers\Url::previous(), ['class' => 'btn btn-primary']) ?>
        </div>
    </div>
    <?php $this->endBlock() ?>
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
                            <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>
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
</div>
