<?php

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use yii\helpers\Url;
use backend\models\Employee;

/* @var $this yii\web\View */
/* @var $model backend\models\Employee */

$this->title = Yii::t('app', 'Profile of') . ' ' . $model->fullname;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Employees'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$roles = Yii::$app->getAuthManager()->getRolesByUser($model->getId());

switch ($model->status) {
    case Employee::STATUS_ACTIVE;
        $status = Yii::t("app", "Active");
        break;
    case Employee::STATUS_BLOCKED;
        $status = Yii::t("app", "Blocked");
        break;
    case Employee::STATUS_DELETED;
        $status = Yii::t("app", "Deleted");
        break;
    default :
        $status = Yii::t("app", "#INVALID");
}
?>

<?php $this->beginBlock('content-header') ?><div class="col-sm-8">
    <h2><?= Html::encode($this->title) ?></h2>
    <?= Breadcrumbs::widget([ 'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : []]) ?></div>
<div class="col-sm-4">
    <div class="title-action">
        <?= Html::a('<span class="glyphicon glyphicon-menu-left"></span> ' . Yii::t('app', 'Back'), Url::previous(), ['class' => 'btn btn-default']) ?>        <?= Html::a('<span class="glyphicon glyphicon-pencil"></span> ' . Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?=
        Html::a('<span class="glyphicon glyphicon-trash"></span> ' . Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ])
        ?>
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
                    <span class="pull-right"> <?= $model->birthday == 0 ? Yii::t("app", "Updating") : date("d/m/Y H:i:s", $model->birthday) ?> </span>
                    <?= $model->attributeLabels()['birthday'] ?>
                </li>
                <li class="list-group-item">
                    <span class="pull-right"><?= ($model->phone == null || empty($model->phone)) ? Yii::t("app", "Updating") : "<a href=\"tel:$model->phone\">$model->phone</a>" ?></span>
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
                <li class="list-group-item">
                    <span class="pull-right"> <?= $status ?> </span>
                    <?= $model->attributeLabels()['status'] ?>
                </li>   
            </ul>

            <strong><?= Yii::t('app', 'Roles') ?></strong>
            <ul class="list-group clear-list"> 
                <?php if (count($roles) == 0): ?>
                    <li class="list-group-item text-warning">
                        <?= Yii::t("app", "Not yet assign any role for this employee"); ?>
                    </li>
                <?php else: ?>
                    <?php foreach ($roles as $role): ?>
                        <li class="list-group-item">
                            <?= ucfirst($role->name) ?>
                        </li>
                    <?php endforeach; ?>
                <?php endif; ?>
            </ul>
            <?php if ($model->status == Employee::STATUS_ACTIVE): ?>
                <?= Html::a(Yii::t('app', 'Block'), ['block', 'id' => $model->id], ['class' => 'btn btn-warning']) ?>
            <?php else: ?>
                <?= Html::a(Yii::t('app', 'Unblock'), ['unblock', 'id' => $model->id], ['class' => 'btn btn-warning']) ?>
            <?php endif; ?>
            <?= Html::a(Yii::t('app', 'Assign Role'), ['assign', 'id' => $model->id], ['class' => 'btn btn-success pull-right']) ?>
        </div>
    </div>
</div>
