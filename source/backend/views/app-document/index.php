<?php

use yii\helpers\Url;

/* @var $categories  backend\components\AppDocumentCategory[] */

$this->title = Yii::t('app', 'Documents');
$this->params['breadcrumbs'][] = $this->title;
?>

<?php foreach ($categories as $category): ?>
    <?php
    $id = base64_encode(serialize(['name' => $category->name, 'path' => $category->dirName]));
    ?>
    <div class="col-md-4">
        <a href="<?= Url::to(['/app-document/articles', 'id' => $id]) ?>">
            <div class="widget lazur-bg p-xl  text-center">
                <i class="<?= $category->icon ?> fa-4x"></i>
                <h2><?= $category->name ?></h2>
            </div>
        </a>
    </div>
<?php endforeach; ?>

