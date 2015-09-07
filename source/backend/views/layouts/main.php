<?php

use yii\helpers\Html;
use backend\assets\MainlyAsset;

MainlyAsset::register($this);
?>


<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?= Html::encode($this->title) ?></title>
        <?= Html::csrfMetaTags() ?>
        <?php $this->head() ?>        
    </head>
    <body class="fixed-nav fixed-sidebar skin-1">
        <?php $this->beginBody() ?>
        <div id="wrapper">
            <?= $this->render('_main_left') ?>

            <div id="page-wrapper" class="gray-bg">
                <?= $this->render('_main_header') ?>
                <?= $this->render('_main_content',['content'=>$content]) ?>
                <?= $this->render('_main_footer') ?>
            </div>
        </div>
        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>



