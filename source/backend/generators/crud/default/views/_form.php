<?php

use yii\helpers\Inflector;
use yii\helpers\StringHelper;

/* @var $this yii\web\View */
/* @var $generator yii\gii\generators\crud\Generator */

/* @var $model \yii\db\ActiveRecord */
$model = new $generator->modelClass();
$safeAttributes = $model->safeAttributes();
if (empty($safeAttributes)) {
    $safeAttributes = $model->attributes();
}

echo "<?php\n";
?>

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model <?= ltrim($generator->modelClass, '\\') ?> */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="panel panel-default">
    <?= "<?php " ?>$form = ActiveForm::begin([
    'layout' => 'horizontal',
    'enableClientValidation' => true,
    ]); ?>
    <div class="panel-body">
        <div class="<?= Inflector::camel2id(StringHelper::basename($generator->modelClass)) ?>-form">
            <?php
            foreach ($generator->getColumnNames() as $attribute) {
                if (in_array($attribute, ['created_at', 'updated_at', 'created_by', 'updated_by'])) {
                    continue;
                }
                if (in_array($attribute, $safeAttributes)) {
                    echo "    <?= " . $generator->generateActiveField($attribute) . " ?>\n\n";
                }
            }
            ?>   
        </div>
    </div>
    <div class="panel-footer">
        <?= "<?= " ?>Html::submitButton($model->isNewRecord ? <?= $generator->generateString('Create') ?> : <?= $generator->generateString('Update') ?>, ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
    <?= "<?php " ?>ActiveForm::end(); ?>
</div>
