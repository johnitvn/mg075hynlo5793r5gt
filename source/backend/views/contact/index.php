<?php

use yii\helpers\Url;

$js = <<<JS
function animationHover(element, animation) {
    element = $(element);
    element.hover(
        function () {
            element.addClass('animated ' + animation);
        },
        function () {
            //wait for animation to finish before removing classes
            window.setTimeout(function () {
                element.removeClass('animated ' + animation);
            }, 2000);
        });
}
$(document).ready(function(){
    $('.contact-box').each(function() {
        animationHover(this, 'pulse');
    });
});
JS;

$this->registerJs($js);
?>
<div class="panel">
    <div class="panel-body">
        <form>
            <div class="input-group">
                <input type="text" placeholder="<?= Yii::t('app', 'Search contact') ?>" class="input form-control" name="q" value="<?= isset($_GET['q']) ? $_GET['q'] : "" ?>">
                <span class="input-group-btn">
                    <button type="submit" class="btn btn btn-primary"><i class = "fa fa-search"></i> <?= Yii::t('app', 'Search') ?></button>
                </span>
            </div>
        </form>       
    </div>
</div>
<div class="row">
    <?php foreach ($models as $model): ?>
        <div class="col-lg-4">
            <div class="contact-box">
                <a href="<?= Url::to(['/profile', 'id' => $model->id]) ?>">
                    <div class="col-sm-4">
                        <div class="text-center">
                            <img alt="image" class="img-circle m-t-xs img-responsive" style="width: 95px;" src="/img/default-avatar/48.jpg">
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <h3><strong><?= $model->fullname ?></strong></h3>
                        <p><strong>Username: </strong><?= $model->username ?></p>
                        <p><strong>Phone: </strong><?= $model->phone ?></p>
                        <p><strong>Email: </strong><?= $model->email ?></p>                       
                    </div>
                    <div class="clearfix"></div>
                </a>
            </div>
        </div>
    <?php endforeach; ?>
</div>
