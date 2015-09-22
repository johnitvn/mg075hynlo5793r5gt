<?php

use yii\helpers\Inflector;
use yii\helpers\StringHelper;

/* @var $this yii\web\View */
/* @var $generator yii\gii\generators\crud\Generator */

$urlParams = $generator->generateUrlParams();

echo "<?php\n";
?>

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use yii\helpers\Url;


/* @var $this yii\web\View */
/* @var $model <?= ltrim($generator->modelClass, '\\') ?> */

$this->title = <?= $generator->generateString('Update {modelClass}: ', ['modelClass' => Inflector::camel2words(StringHelper::basename($generator->modelClass))]) ?> . ' ' . $model-><?= $generator->getNameAttribute() ?>;
$this->params['breadcrumbs'][] = ['label' => <?= $generator->generateString(Inflector::pluralize(Inflector::camel2words(StringHelper::basename($generator->modelClass)))) ?>, 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model-><?= $generator->getNameAttribute() ?>, 'url' => ['view', <?= $urlParams ?>]];
$this->params['breadcrumbs'][] = <?= $generator->generateString('Update') ?>;
?>

<?= '<?php $this->beginBlock(\'content-header\') ?>' ?>
<div class="col-sm-8">
    <h2><?= '<?= Html::encode($this->title) ?>' ?></h2>
    <?= '<?= Breadcrumbs::widget([ \'links\' => isset($this->params[\'breadcrumbs\']) ? $this->params[\'breadcrumbs\'] : []]) ?>' ?>
</div>
<div class="col-sm-4">
    <div class="title-action">
        <?= '<?= Html::a(\'<span class="glyphicon glyphicon-menu-left"></span>\' . ' . $generator->generateString('Back') . ', Url::previous(), [\'class\' => \'btn btn-default\']) ?>' ?>
    </div>
</div>
<?= '<?php $this->endBlock() ?>' ?>

<div class="<?= Inflector::camel2id(StringHelper::basename($generator->modelClass)) ?>-update">

    <?= "<?= " ?>$this->render('_form', [
    'model' => $model,
    ]) ?>

</div>
