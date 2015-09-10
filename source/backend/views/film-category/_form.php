<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\widgets\Breadcrumbs;

/**
 * @var yii\web\View $this
 * @var backend\models\FilmCategory $model
 * @var yii\widgets\ActiveForm $form
 */
?>


<div class="row">
    <div class="col-lg-8">
        <?php
        $form = ActiveForm::begin([
                    'id' => 'FilmCategory',
                    'layout' => 'horizontal',
                    'enableClientValidation' => true,
                    'errorSummaryCssClass' => 'error-summary alert alert-error'
                        ]
        );
        ?>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2><?= $model->name ?></h2>
            </div>
            <div class="panel-body">
                <?php echo $form->errorSummary($model); ?>
                <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
                <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="panel-footer">
                <?=
                Html::submitButton(
                        '<span class="glyphicon glyphicon-check"></span> ' .
                        ($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Save')), [
                    'id' => 'save-' . $model->formName(),
                    'class' => 'btn btn-success'
                        ]
                );
                ?>
            </div>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>
