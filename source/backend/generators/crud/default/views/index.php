<?php

use yii\helpers\Inflector;
use yii\helpers\StringHelper;


/* @var $this yii\web\View */
/* @var $generator yii\gii\generators\crud\Generator */

$urlParams = $generator->generateUrlParams();
$nameAttribute = $generator->getNameAttribute();

echo "<?php\n";
?>

use yii\helpers\Html;
use <?= $generator->indexWidgetType === 'grid' ? "yii\\grid\\GridView" : "yii\\widgets\\ListView" ?>;
use yii\widgets\Breadcrumbs;

/* @var $this yii\web\View */
<?= !empty($generator->searchModelClass) ? "/* @var \$searchModel " . ltrim($generator->searchModelClass, '\\') . " */\n" : '' ?>
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = <?= $generator->generateString(Inflector::pluralize(Inflector::camel2words(StringHelper::basename($generator->modelClass)))) ?>;
$this->params['breadcrumbs'][] = $this->title;
?>

<?='<?php $this->beginBlock(\'content-header\') ?>'?>
<div class="col-sm-8">
    <h2><?= '<?= Html::encode($this->title) ?>' ?></h2>
    <?= '<?= Breadcrumbs::widget([ \'links\' => isset($this->params[\'breadcrumbs\']) ? $this->params[\'breadcrumbs\'] : []]) ?>' ?>
</div>
<div class="col-sm-4">
    <div class="title-action">
        <?= '<?= Html::a(\'<span class="glyphicon glyphicon-plus"></span>\' . ' . $generator->generateString('Add New') . ', [\'create\'], [\'class\' => \'btn btn-primary\']) ?>' ?>
    </div>
</div>
<?='<?php $this->endBlock() ?>'?>


<div class="<?= Inflector::camel2id(StringHelper::basename($generator->modelClass)) ?>-index">
    <div class="panel panel-default">    
        <div class="panel-body"> 
            <form>
                <div class="input-group">
                    <input type="text" placeholder="<?= '<?=' . $generator->generateString('Search ' . Inflector::camel2id(StringHelper::basename($generator->modelClass))) . '?>' ?>" class="input form-control" name="q" value="<?='<?= isset($_GET[\'q\']) ? $_GET[\'q\'] : "" ?>'?>">
                    <span class="input-group-btn">
                        <button type="submit" class="btn btn btn-primary"><i class = "fa fa-search"></i> <?= '<?=' . $generator->generateString('Search') . '?>' ?></button>
                    </span>
                </div>
            </form>          
            <div class="table-responsive m-t">
                <?php if ($generator->indexWidgetType === 'grid'): ?>
                    <?= "<?= " ?>GridView::widget([
                    'layout' => '{items}{pager}',
                    'dataProvider' => $dataProvider,
                    'pager' => [
                    'class' => yii\widgets\LinkPager::className(),
                    'firstPageLabel' => Yii::t('app', 'First'),
                    'lastPageLabel' => Yii::t('app', 'Last')
                    ],
                    'tableOptions' => ['class' => 'table table-striped table-hover'],
                    <?= "    'columns' => [\n"; ?>
                    <?php
                    $count = 0;
                    if (($tableSchema = $generator->getTableSchema()) === false) {
                        foreach ($generator->getColumnNames() as $name) {
                            if (++$count < 6) {
                                echo "                '" . $name . "',\n";
                            } else {
                                echo "                // '" . $name . "',\n";
                            }
                        }
                    } else {
                        foreach ($tableSchema->columns as $column) {
                            $format = $generator->generateColumnFormat($column);
                            if (++$count < 6) {
                                echo "                '" . $column->name . ($format === 'text' ? "" : ":" . $format) . "',\n";
                            } else {
                                echo "                // '" . $column->name . ($format === 'text' ? "" : ":" . $format) . "',\n";
                            }
                        }
                    }
                    ?>
                    ['class' => 'backend\components\grid\ActionColumn'],
                    ],
                    ]); ?>
                <?php else: ?>
                    <?= "<?= " ?>ListView::widget([
                    'dataProvider' => $dataProvider,
                    'itemOptions' => ['class' => 'item'],
                    'itemView' => function ($model, $key, $index, $widget) {
                    return Html::a(Html::encode($model-><?= $nameAttribute ?>), ['view', <?= $urlParams ?>]);
                    },
                    ]) ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
