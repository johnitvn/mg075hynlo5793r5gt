<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use ijackua\lepture\Markdowneditor;
use backend\models\Country;
use yii\helpers\ArrayHelper;
use backend\assets\ICheckAsset;

/**
 * @var yii\web\View $this
 * @var backend\models\FilmActor $model
 * @var yii\widgets\ActiveForm $form
 */
ICheckAsset::register($this);

$css = <<<CSS
a.icon-fullscreen {display: none}
.editor-toolbar:before, .editor-toolbar:after {background: none}
.editor-toolbar{border:1px solid #DEE1E3}
CSS;

$this->registerCss($css);

$js = <<<JS
$('input').iCheck({
    checkboxClass: 'icheckbox_flat-blue',
    radioClass: 'iradio_flat-blue'
});
        
$('#filmactor-birthdayupdatting').on('ifUnchecked',function(){
    $('#filmactor-birthdayupdatting').removeAttr("checked");
    $('#filmactor-birthday').removeAttr('disabled');
});
        
$('#filmactor-birthdayupdatting').on('ifChecked',function(){
    $('#filmactor-birthdayupdatting').attr("checked",true);
    $('#filmactor-birthday').attr('disabled','true');
});
        
        
$('input[name="FilmActor[countryUpdating]"]').on('ifUnchecked',function(){
    $('#filmactor-country_id').removeAttr('disabled');
});
        
$('input[name="FilmActor[countryUpdating]"]').on('ifChecked',function(){
    $('#filmactor-country_id').attr('disabled','true');
});
        
JS;
$this->registerJs($js);

$countryMap = ArrayHelper::map(Country::find()->all(), 'id', 'name');
?>


<div class="row">
    <div class="col-lg-8">
        <?php
        $form = ActiveForm::begin([
                    'id' => 'FilmActor',
                    'layout' => 'horizontal',
                    'enableClientValidation' => true,
                    'errorSummaryCssClass' => 'error-summary alert alert-error'
        ]);
        ?>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2><?= $model->name ?></h2>
            </div>
            <div class="panel-body">
                <?php echo $form->errorSummary($model); ?>
                <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
                <hr>
                <div class="form-group field-filmactor-birthday">
                    <label class="control-label col-sm-3" for="filmactor-birthday">Birthday</label>
                    <div class="col-sm-6">
                        <p>             
                            <?= Html::activeCheckbox($model, 'birthdayUpdatting', ['class' => 'icheck', 'label' => 'Updatting...']) ?>
                        </p>
                        <p>   
                            <?= Html::activeInput('date', $model, 'birthday', ['class' => 'form-control', 'disabled' => true]) ?>
                        </p>
                        <div class="help-block help-block-error "></div>
                    </div>
                </div>
                <hr>
                <div class="form-group field-filmactor-country">
                    <label class="control-label col-sm-3" for="filmactor-birthday">Country</label>
                    <div class="col-sm-6">
                        <p>             
                            <?= Html::activeCheckbox($model, 'countryUpdating', ['class' => 'icheck', 'label' => 'Updatting...']) ?>
                        </p>
                        <p>   
                            <?= Html::activeDropDownList($model, 'country_id', $countryMap, ['class' => 'form-control', 'prompt' => 'Select country', 'disabled' => true]) ?>
                        </p>
                        <div class="help-block help-block-error "></div>
                    </div>
                </div>
                <hr>
                <div class="form-group field-filmactor-country">
                    <label class="control-label col-sm-3" for="filmactor-profile">Profile</label>
                    <div class="col-sm-9">
                        <p>             
                            <?= Html::activeCheckbox($model, 'profileUpdating', ['class' => 'icheck', 'label' => 'Updatting...']) ?>
                        </p>
                        <p>   
                            <?=
                            Markdowneditor::widget(
                                    [
                                        'model' => $model,
                                        'attribute' => 'profile',
                                        'markedOptions' => [
                                            'tables' => false
                                        ]
                            ])
                            ?>
                        </p>

                    </div>

                </div>



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

