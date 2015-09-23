<?php

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use yii\helpers\Url;
use backend\models\Employee;

/* @var $this yii\web\View */
/* @var $model backend\models\Employee */

$this->title = Yii::t('app', 'Profile');
$this->params['breadcrumbs'][] = $this->title;
?>

<?php $this->beginBlock('content-header') ?><div class="col-sm-8">
    <h2><?= Html::encode($this->title) ?></h2>
    <?= Breadcrumbs::widget([ 'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : []]) ?></div>
<div class="col-sm-4">
    <div class="title-action">
        <?= Html::a('<span class="glyphicon glyphicon-menu-left"></span> ' . Yii::t('app', 'Back'), Url::previous(), ['class' => 'btn btn-default']) ?>       
        <?= Html::a('<span class="glyphicon glyphicon-pencil"></span> ' . Yii::t('app', 'Update'), ['update'], ['class' => 'btn btn-primary']) ?>       
    </div>
</div>
<?php $this->endBlock() ?>

<div class="employee-view col-lg-4 col-md-6">
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="view-header row m-b-lg">
                <div class="col-lg-4 text-center">
                    <div class="m-b-sm">
                        <?php if ($model->avatar == null): ?>
                            <img  class="img-circle" style="width: 82px"   src="/img/default-avatar/48.jpg">                                                            
                        <?php endif; ?>
                    </div>                    
                </div>
                <div class="col-lg-8" style="padding-left: 0">
                    <h2><?= $model->fullname ?></h2>   
                    <h3><?= $model->username ?></h3>
                </div>
            </div>

            <strong><?= Yii::t('app', 'Information') ?></strong>
            <ul class="list-group clear-list">
                <li class="list-group-item fist-item">
                    <span class="pull-right"> <?= $model->gender == 0 ? Yii::t('app', 'Male') : Yii::t('app', 'Famale') ?> </span>
                    <?= $model->attributeLabels()['gender'] ?>
                </li>
                <li class="list-group-item">
                    <span class="pull-right"> 20/06/1993 </span>
                    <?= $model->attributeLabels()['birthday'] ?>
                </li>
                <li class="list-group-item">
                    <span class="pull-right"><a href="tel:<?= $model->phone ?>"><?= $model->phone ?></a></span>
                    <?= $model->attributeLabels()['phone'] ?>
                </li>    
                <li class="list-group-item">
                    <span class="pull-right"><a href="mailto:<?= $model->email ?>"><?= $model->email ?></a></span>
                    <?= $model->attributeLabels()['email'] ?>
                </li>
                <li class="list-group-item">
                    <span class="pull-right"> <?= $model->created_by == 0 ? "Console App" : Employee::findIdentity($model->created_by)->username; ?>  </span>
                    <?= $model->attributeLabels()['created_by'] ?>
                </li> 
                <li class="list-group-item">
                    <span class="pull-right"> <?= $model->created_by == 0 ? "Console App" : Employee::findIdentity($model->created_by)->username; ?>  </span>
                    <?= $model->attributeLabels()['updated_by'] ?>
                </li> 
                <li class="list-group-item">
                    <span class="pull-right"> <?= date("d/m/Y h:i:s", $model->created_at) ?>  </span>
                    <?= $model->attributeLabels()['created_at'] ?>
                </li>      
                <li class="list-group-item">
                    <span class="pull-right"><?= date("d/m/Y h:i:s", $model->updated_at) ?> </span>
                    <?= $model->attributeLabels()['updated_at'] ?>
                </li>                   
            </ul>
        </div>
    </div>
</div>
