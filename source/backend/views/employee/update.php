<?php

use yii\bootstrap\Html;
use yii\bootstrap\ActiveForm;
use yii\widgets\Breadcrumbs;

/**
 * @var yii\web\View $this
 * @var backend\models\Employee $model
 */
$this->title = 'Employee ' . $model->id . ', ' . Yii::t('employee', 'Edit');
$this->params['breadcrumbs'][] = ['label' => 'Employees', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => '@' . $model->username, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('employee', 'Edit');
?>

<?php $this->beginBlock('content-header') ?>
<div class="col-sm-8">
    <h2><?= Html::encode($this->title) ?></h2>
    <?= Breadcrumbs::widget([ 'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : []]) ?>
</div>
<div class="col-sm-4">
    <div class="title-action">
        <?= Html::a(Yii::t('employee', 'Back'), \yii\helpers\Url::previous(), ['class' => 'btn btn-primary']) ?>
    </div>
</div>
<?php $this->endBlock() ?>

<div class="giiant-crud employee-update">   
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
                            <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>
                            <?= $form->field($model, 'birthday')->textInput(['data-mask' => '99/99/9999']) ?>
                            <?= $form->field($model, 'gender')->textInput(['maxlength' => true]) ?>
                            <hr/>
                            <?=
                            Html::submitButton(
                                    '<span class="glyphicon glyphicon-check"></span> ' .
                                    ($model->isNewRecord ? Yii::t('employee', 'Create') : Yii::t('employee', 'Save')), [
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
