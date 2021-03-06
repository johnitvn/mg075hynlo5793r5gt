<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\widgets\Breadcrumbs;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model backend\models\Employee */

$this->title = Yii::t('app', 'Update');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Profile'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$genderLists = [
    backend\models\Employee::MALE => Yii::t("app", "Male"),
    backend\models\Employee::FAMALE => Yii::t("app", "Famale"),
];
?>

<?php $this->beginBlock('content-header') ?><div class="col-sm-8">
    <h2><?= Html::encode($this->title) ?></h2>
    <?= Breadcrumbs::widget([ 'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : []]) ?></div>
<div class="col-sm-4">
    <div class="title-action">
        <?= Html::a('<span class="glyphicon glyphicon-menu-left"></span>' . Yii::t('app', 'Back'), Url::previous(), ['class' => 'btn btn-default']) ?>    </div>
</div>
<?php $this->endBlock() ?>
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
                <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
                <?= $form->field($model, 'fullname')->textInput(['maxlength' => true]) ?>
                <?= $form->field($model, 'gender')->dropDownList($genderLists) ?>
                <?= $form->field($model, 'birthday')->textInput() ?>
                <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>            
            </div>
        </div>
        <div class="panel-footer">
            <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
        <?php ActiveForm::end(); ?>
    </div>


</div>
