<?php

use yii\helpers\Html;
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
        <?= Html::a('<span class="glyphicon glyphicon-pencil"></span> ' . Yii::t('employee', 'Edit'), ['update', 'id' => $employee->id], ['class' => 'btn btn-primary']) ?>
    </div>
</div>
<div class="employee-detail">
    <div>
        <strong>Information</strong>
        <ul class="list-group clear-list">
            <li class="list-group-item fist-item">
                <span class="pull-right"> <?= $employee->gender == 0 ? Yii::t('employee', 'Male') : Yii::t('employee', 'Famale') ?> </span>
                Gender
            </li>
            <li class="list-group-item">
                <span class="pull-right"> 20/06/1993 </span>
                Birthday
            </li>
            <li class="list-group-item">
                <span class="pull-right"><a href="tel:<?= $employee->phone ?>"><?= $employee->phone ?></a></span>
                Phone
            </li>    
            <li class="list-group-item">
                <span class="pull-right"><a href="mailto:<?= $employee->email ?>"><?= $employee->email ?></a></span>
                Email
            </li>    
        </ul>
        <strong>Roles</strong>
        <ul class="list-group clear-list">                   
            <li class="list-group-item">
                Editor
            </li>
            <li class="list-group-item">
                Employee Manager
            </li>
            <li class="list-group-item">
                System Administrator
            </li>
        </ul>
        <strong>Extra Information</strong>
        <ul class="list-group clear-list">                                     
            <li class="list-group-item fist-item">
                <span class="pull-right"> <?= '(not set)' ?> </span>
                Created by
            </li>      
            <li class="list-group-item">
                <span class="pull-right"> <?= date("d/m/Y h:i:s", $employee->created_at) ?>  </span>
                Created at
            </li>      
            <li class="list-group-item">
                <span class="pull-right"><?= date("d/m/Y h:i:s", $employee->updated_at) ?> </span>
                Updated at
            </li>     
            <li class="list-group-item">
                <span class="pull-right"> None block </span>
                Blocked
            </li>   
        </ul>
        <hr>          
        <button type="button" class="btn btn-warning btn-sm"><i class="fa fa-indent"></i> Block</button>
        <button type="button" class="btn btn-danger btn-sm pull-right"><i class="fa fa-indent"></i> Delete</button>
    </div>
</div>       
