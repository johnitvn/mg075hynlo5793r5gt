<?php

use yii\helpers\Inflector;
use yii\helpers\StringHelper;

/* @var $this yii\web\View */
/* @var $generator yii\gii\generators\crud\Generator */

$urlParams = $generator->generateUrlParams();

echo "<?php\n";
?>

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\Breadcrumbs;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model <?= ltrim($generator->modelClass, '\\') ?> */

$this->title = $model-><?= $generator->getNameAttribute() ?>;
$this->params['breadcrumbs'][] = ['label' => <?= $generator->generateString(Inflector::pluralize(Inflector::camel2words(StringHelper::basename($generator->modelClass)))) ?>, 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<?= '<?php $this->beginBlock(\'content-header\') ?>' ?>
<div class="col-sm-8">
    <h2><?= '<?= Html::encode($this->title) ?>' ?></h2>
    <?= '<?= Breadcrumbs::widget([ \'links\' => isset($this->params[\'breadcrumbs\']) ? $this->params[\'breadcrumbs\'] : []]) ?>' ?>
</div>
<div class="col-sm-4">
    <div class="title-action">
        <?= '<?= Html::a(\'<span class="glyphicon glyphicon-menu-left"></span> \' . ' . $generator->generateString('Back') . ', Url::previous(), [\'class\' => \'btn btn-default\']) ?>' ?>
        <?= "<?= " ?>Html::a('<span class="glyphicon glyphicon-pencil"></span> '.<?= $generator->generateString('Update') ?>, ['update', <?= $urlParams ?>], ['class' => 'btn btn-primary']) ?>
        <?= "<?= " ?>Html::a('<span class="glyphicon glyphicon-trash"></span> '.<?= $generator->generateString('Delete') ?>, ['delete', <?= $urlParams ?>], [
        'class' => 'btn btn-danger',
        'data' => [
        'confirm' => <?= $generator->generateString('Are you sure you want to delete this item?') ?>,
        'method' => 'post',
        ],
        ]) ?>
    </div>
</div>
<?= '<?php $this->endBlock() ?>' ?>


<div class="<?= Inflector::camel2id(StringHelper::basename($generator->modelClass)) ?>-view">
    <div class="panel panel-default">
        <div class="panel-body">

            <?= "<?= " ?>DetailView::widget([
            'model' => $model,
            'attributes' => [
            <?php
            if (($tableSchema = $generator->getTableSchema()) === false) {
                foreach ($generator->getColumnNames() as $name) {
                    echo "            '" . $name . "',\n";
                }
            } else {
                foreach ($generator->getTableSchema()->columns as $column) {
                    $format = $generator->generateColumnFormat($column);
                    echo "            '" . $column->name . ($format === 'text' ? "" : ":" . $format) . "',\n";
                }
            }
            ?>
            ],
            ]) ?>
        </div>
    </div>
</div>
