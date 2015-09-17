<?php

use yii\helpers\Html;

$this->title = $name;
?>
<h1 class="font-bold"><?= nl2br(Html::encode($message)) ?></h1>
<div class="error-desc">        
    <p>
        <?= Yii::t('app', 'The above error occurred while the Web server was processing your request.') ?><BR>
        <?= Yii::t('app', 'Please contact us if you think this is a server error. Thank you.') ?><BR>
        <?= Yii::t('app', 'Meanwhile, you may return to Home') ?>
    </p>       
</div>
<?= Html::a(Yii::t('app', 'Home'), ['create'], ['class' => 'btn btn-primary m-t']) ?>


