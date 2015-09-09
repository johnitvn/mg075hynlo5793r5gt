<?php

use yii\bootstrap\ActiveForm;

$this->registerJs('setTimeout(function(){$(".col-sm-12").attr("class","col-sm-6 b-r");$(".col-sm-6.hidden").removeClass("hidden")},1000);' .
        'setTimeout(function(){$("img").attr("src",$("img").attr("data-src")).attr("class","animated fadeIn")},1100)');
?>
<div class="ibox float-e-margins">
    <div class="ibox-title">
        <h3><?= Yii::t("sign", "Sign In To Backend System") ?></h3>        
    </div>
    <div class="ibox-content">
        <div class="row">
            <div class="col-sm-12 b-r">
                <?php $form = ActiveForm::begin(['options' => ['class' => 'login-form']]); ?>
                <?= $form->field($model, 'username') ?>
                <?= $form->field($model, 'password')->passwordInput() ?>    
                <div class="pull-left">
                    <?= $form->field($model, 'rememberMe')->checkbox() ?>
                </div>
                <a class="pull-right" href="/password/forgot">Forgot password?</a>

                <input type="submit" class="btn btn-sm btn-primary btn-block" value="Log in" >
                <?php ActiveForm::end(); ?>
            </div>   
            <div class="col-sm-6 hidden">
                <img style="width:80px" data-src="/img/signin/bad-bots.png">
                <div class="m-t">
                    Your IP address is not in the white list. We've saved your IP address. If you are not yota's staff then you can be sued because  try to login illegal
                </div>
            </div>            
        </div>
    </div>
    <div class="m-t">
        Copyright Yota 2015-2015. All right received.    
    </div>
</div>

