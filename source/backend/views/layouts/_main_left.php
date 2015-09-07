<?php

use backend\widgets\Menu;
?>
<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <?=
        Menu::widget([
            'items' => [
                ['label' => 'Home', 'icon' => 'fa fa-dashboard', 'url' => ['site/index']],
                ['label' => 'Products', 'url' => ['product/index'], 'items' => [
                        ['label' => 'New Arrivals', 'url' => ['product/index', 'tag' => 'new']],
                        ['label' => 'Most Popular', 'url' => ['product/index', 'tag' => 'popular']],
                    ]],
                ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
            ],
        ]);
        ?>
    </div>
</nav>
