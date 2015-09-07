<?php

namespace backend\widgets;

use yii\base\Widget;
use yii\helpers\Html;
use yii\helpers\Url;

/**
 * @author john
 */
class MenuHeader extends Widget {

    public $items = [];

    public function run() {
        $content = $this->renderAvatar();
        $content .= $this->renderDropdownMenu();
        return Html::tag('div', $content, ["class" => "dropdown profile-element"]);
    }

    private function renderAvatar() {
        $avatarImg = Html::img('/img/avatar/48.jpg', ['class' => 'img-circle']);
        return Html::tag('span', $avatarImg);
    }

    private function renderDropdownMenu() {
        $link = Html::a($this->renderUserInfo(), '#', ["data-toggle" => "dropdown", "class" => "dropdown-toggle"]);
        return $link . $this->renderDropdownMenuItems();
    }

    private function renderDropdownMenuItems() {
        $menuItems = [];
        foreach ($this->items as $item) {
            $menuItems[] = Html::tag('li', '<a href="' . Url::to($item['url']) . '">' . $item['label'] . '</a>');
        }
        return Html::tag('ul', implode('', $menuItems), ['class' => 'dropdown-menu animated fadeInRight m-t-xs']);
    }

    private function renderUserInfo() {
        $username = Html::tag('span', '<strong class="font-bold">' . 'Demo User' . '</strong>', ['class' => 'block m-t-xs']);
        $department = Html::tag('span', 'Art Director <b class="caret"></b>', ['class' => 'text-muted text-xs block']);
        return Html::tag('span', $username . $department, ['class' => 'clear']);
    }

}
