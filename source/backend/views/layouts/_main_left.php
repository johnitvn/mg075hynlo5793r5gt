<?php

use backend\widgets\Menu;
?>
<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <?=
        Menu::widget(require Yii::getAlias('@backend/config/menus.php'));
        ?>
    </div>
</nav>
