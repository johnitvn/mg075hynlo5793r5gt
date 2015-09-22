<?php

use dmstr\helpers\Html;
use yii\widgets\Breadcrumbs;
use yii\bootstrap\ActiveForm;

/**
 * @var yii\web\View $this
 * @var backend\models\Country $model
 */
$this->title = Yii::t('app', 'Assign roles to ') . ' "' . $model->user->username . '"';
$this->params['breadcrumbs'][] = ['label' => 'Employees', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string) $model->user->username, 'url' => ['view', 'id' => $model->user->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Assign');
?>

<?php $this->beginBlock('content-header') ?>
<div class="col-sm-8">
    <h2><?= Html::encode($this->title) ?></h2>
    <?= Breadcrumbs::widget([ 'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : []]) ?>
</div>
<div class="col-sm-4">
    <div class="title-action">
        <?= Html::a('<span class="glyphicon glyphicon-list"></span> ' . Yii::t('app', 'Back'), ['index'], ['class' => 'btn btn-default']) ?>
    </div>
</div>
<?php $this->endBlock() ?>


<div class="row">
    <div class="col-lg-8">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="employee-assign-form">
                    <?php
                    $form = ActiveForm::begin([
                                'layout' => 'horizontal',
                                'enableClientValidation' => true,
                                'errorSummaryCssClass' => 'error-summary alert alert-error'
                                    ]
                    );
                    ?>

                    <?= $form->field($model, 'roleName')->radioList($model->allRoles) ?>

                    <hr/>
                    <?=
                    Html::submitButton(
                            '<span class="glyphicon glyphicon-check"></span> ' . Yii::t('app', 'Save'), [
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