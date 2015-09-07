<?php

use yii\widgets\Breadcrumbs;
use yii\helpers\Html;
use yii\helpers\Inflector;
use common\widgets\Alert;
?>
<div class="row wrapper border-bottom white-bg page-heading ">
    <?php if (isset($this->blocks['content-header'])) { ?>
        <?= $this->blocks['content-header'] ?>
    <?php } else { ?>
        <div class="col-sm-12">
            <h2>
                <?php
                if ($this->title !== null) {
                    echo Html::encode($this->title);
                } else {
                    echo Inflector::camel2words(Inflector::id2camel($this->context->module->id));
                }
                ?>
            </h2>
            <?= Breadcrumbs::widget([ 'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : []]) ?>
        </div>
    <?php } ?>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="wrapper wrapper-content animated fadeInRight">
            <?= Alert::widget() ?>
            <?= $content ?>
        </div>
    </div>
</div>
