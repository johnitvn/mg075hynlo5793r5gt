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

$default = [0 => ''];
$countryMap = ArrayHelper::merge($default, ArrayHelper::map(Country::find()->all(), 'id', 'name'));
?>


<div class="row">
    <div class="col-lg-8">
        <?php
        $form = ActiveForm::begin([
                    'id' => 'FilmActor',
                    'layout' => 'horizontal',
                    'enableClientValidation' => true,
        ]);
        ?>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2><?= $model->name ?></h2>
            </div>
            <div class="panel-body">
                <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
                <?= $form->field($model, 'other_name')->textInput(['maxlength' => true]) ?>
                <?= $form->field($model, 'birthday')->textInput() ?>
                <?= $form->field($model, 'country_id')->dropDownList($countryMap) ?>
                <div class="form-group field-filmactor-country">
                    <label class="control-label col-sm-3" for="filmactor-profile">Profile</label>
                    <div class="col-sm-9">                       
                        <p>   
                            <?=
                            Markdowneditor::widget(
                                    [
                                        'model' => $model,
                                        'attribute' => 'profile',
                                        'markedOptions' => [
                                            'tables' => false,
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

