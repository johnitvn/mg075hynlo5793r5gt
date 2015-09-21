<?php

use yii\helpers\Html;
use backend\models\Employee;

$roles = Yii::$app->getAuthManager()->getRolesByUser($employee->getId());

switch ($employee->status) {
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
<div class="row m-b-lg">
    <div class="col-lg-4 text-center">
        <div class="m-b-sm">
            <?php if ($employee->avatar == null): ?>
                <img  class="img-circle"  style="width: 62px"  src="/img/default-avatar/48.jpg">                                                            
            <?php endif; ?>
        </div>
        <h3>@<?= $employee->username ?></h3>
    </div>
    <div class="col-lg-8">
        <h2><?= $employee->fullname ?></h2>   
        <?= Html::a(Yii::t('app', 'Edit'), ['update', 'id' => $employee->id], ['class' => 'btn btn-success']) ?>
        <?= Html::a(Yii::t('app', 'Assign Role'), ['update', 'id' => $employee->id], ['class' => 'btn btn-primary']) ?>
    </div>
</div>
<div class="employee-detail">
    <div>
        <strong><?= Yii::t('app', 'Information') ?></strong>
        <ul class="list-group clear-list">
            <li class="list-group-item fist-item">
                <span class="pull-right"> <?= $employee->gender == 0 ? Yii::t('app', 'Male') : Yii::t('app', 'Famale') ?> </span>
                <?= $employee->attributeLabels()['gender'] ?>
            </li>
            <li class="list-group-item">
                <span class="pull-right"> 20/06/1993 </span>
                <?= $employee->attributeLabels()['birthday'] ?>
            </li>
            <li class="list-group-item">
                <span class="pull-right"><a href="tel:<?= $employee->phone ?>"><?= $employee->phone ?></a></span>
                <?= $employee->attributeLabels()['phone'] ?>
            </li>    
            <li class="list-group-item">
                <span class="pull-right"><a href="mailto:<?= $employee->email ?>"><?= $employee->email ?></a></span>
                <?= $employee->attributeLabels()['email'] ?>
            </li>
            <li class="list-group-item">
                <span class="pull-right"> <?= $employee->created_by == 0 ? "Console App" : Employee::findIdentity($employee->created_by)->username; ?>  </span>
                <?= $employee->attributeLabels()['created_by'] ?>
            </li> 
            <li class="list-group-item">
                <span class="pull-right"> <?= $employee->created_by == 0 ? "Console App" : Employee::findIdentity($employee->created_by)->username; ?>  </span>
                <?= $employee->attributeLabels()['updated_by'] ?>
            </li> 
            <li class="list-group-item">
                <span class="pull-right"> <?= date("d/m/Y h:i:s", $employee->created_at) ?>  </span>
                <?= $employee->attributeLabels()['created_at'] ?>
            </li>      
            <li class="list-group-item">
                <span class="pull-right"><?= date("d/m/Y h:i:s", $employee->updated_at) ?> </span>
                <?= $employee->attributeLabels()['updated_at'] ?>
            </li>     
            <li class="list-group-item">
                <span class="pull-right"> <?= $status ?> </span>
                <?= $employee->attributeLabels()['status'] ?>
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
                        <?= $role->name ?>
                    </li>
                <?php endforeach; ?>
            <?php endif; ?>
        </ul>        

        <?= Html::a(Yii::t('app', 'Block'), ['block', 'id' => $employee->id], ['class' => 'btn btn-warning btn-block']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $employee->id], ['class' => 'btn btn-danger btn-block']) ?>

    </div>
</div>       
