<?php

use yii\helpers\Html;

$this->title = $name;
?>
<h1 class="font-bold"><?= nl2br(Html::encode($message)) ?></h1>
<div class="error-desc">        
    <p>
        The above error occurred while the Web server was processing your request.
        Please contact us if you think this is a server error. Thank you.
        Meanwhile, you may return to Dashboard
        form.
    </p>       
</div>
<?= Html::a(Yii::t('error', 'Dashboard'), ['create'], ['class' => 'btn btn-primary m-t']) ?>


