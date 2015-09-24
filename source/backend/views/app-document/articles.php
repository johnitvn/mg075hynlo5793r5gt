<?php

use yii\helpers\Url;

/* @var $articles  backend\components\AppDocumentFile */
$this->title = $categoryName;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Documents'), 'url' => ['/app-document']];
$this->params['breadcrumbs'][] = $this->title;
?>


<?php if (!$isAvaiableInLanguage) : ?>
    <div class="widget yellow-bg p-lg text-center">
        <div class="m-b-md">
            <i class="fa fa-warning fa-4x"></i>
            <h1 class="m-xs"><?= Yii::t('app', 'Document is not available for this language') ?></h1>            
        </div>
    </div>
<?php else: ?>
    <?php foreach ($articles as $article): ?>
        <?php
        $id = base64_encode(serialize(['categoryName' => $categoryName, 'name' => $article->name, 'path' => $article->path]));
        ?>
        <div class="faq-item">
            <a  href="<?= Url::to(['/app-document/view', 'id' => $id]) ?>" class="faq-question"><?= $article->name ?></a>
            <span><?= $article->description ?></span>
        </div>
    <?php endforeach; ?>
<?php endif; ?>