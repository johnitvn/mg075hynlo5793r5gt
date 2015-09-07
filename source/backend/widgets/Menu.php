<?php

namespace backend\widgets;

use Yii;
use yii\widgets\Menu as BaseMenu;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\helpers\Html;

/**
 * Description of Menu
 *
 * @author john
 */
class Menu extends BaseMenu {

    /**
     * 
     * @var array header items. Each header menu item should be an array of the following structure:
     * 
     * - label: string, specifies the menu item label.
     * - url: string or array, specifies the URL of the menu item. 
     */
    public $headerMenuItems = [];

    /**
     * @var string the template used to render the body of a menu which is a link.
     * In this template, the token `{url}` will be replaced with the corresponding link URL;
     * while `{label}` will be replaced with the link text and `{icon}` is the icons prefix for link
     * This property will be overridden by the `template` option set in individual menu items via [[items]].
     */
    public $linkTemplate = '<a href="{url}">{icon}<span class="nav-label">{label}</span></a>';

    /**
     * @var string the template used to render the body of a menu which is NOT a link.
     * In this template, the token `{label}` will be replaced with the label of the menu item.
     * This property will be overridden by the `template` option set in individual menu items via [[items]].
     */
    public $labelTemplate = '<span class="nav-group-label">{label}</span>';

    /**
     * @var string the template used to render a list of sub-menus.
     * In this template, the token `{items}` will be replaced with the rendered sub-menu items.
     */
    public $submenuTemplate = "\n<ul class=\"nav\">\n{items}\n</ul>\n";

    /**
     *
     * @var array Default options for this widget 
     */
    private $_defaultOptions = [
        'class' => 'nav',
        'id' => 'side-menu',
    ];

    public function init() {
        $this->options = ArrayHelper::merge($this->_defaultOptions, $this->options);
    }

    public function run() {
        $headerContent = MenuHeader::widget([
                    'items' => $this->headerMenuItems,
        ]);
        $header = Html::tag('li', $headerContent, ['class' => 'nav-header']);


        /**
         * Inherite from parent
         */
        if ($this->route === null && Yii::$app->controller !== null) {
            $this->route = Yii::$app->controller->getRoute();
        }
        if ($this->params === null) {
            $this->params = Yii::$app->request->getQueryParams();
        }
        $items = $this->normalizeItems($this->items, $hasActiveChild);
        if (!empty($items)) {
            $options = $this->options;
            $tag = ArrayHelper::remove($options, 'tag', 'ul');

            if ($tag !== false) {
                echo Html::tag($tag, $header . $this->renderItems($items), $options);
            } else {
                echo $this->renderItems($items);
            }
        }
    }

    /**
     * Recursively renders the menu items (without the container tag).
     * @param array $items the menu items to be rendered recursively
     * @return string the rendering result
     */
    protected function renderItems($items) {
        $n = count($items);
        $lines = [];


        foreach ($items as $i => $item) {
            $options = array_merge($this->itemOptions, ArrayHelper::getValue($item, 'options', []));
            $tag = ArrayHelper::remove($options, 'tag', 'li');
            $class = [];
            if ($item['active']) {
                $class[] = $this->activeCssClass;
            }
            if ($i === 0 && $this->firstItemCssClass !== null) {
                $class[] = $this->firstItemCssClass;
            }
            if ($i === $n - 1 && $this->lastItemCssClass !== null) {
                $class[] = $this->lastItemCssClass;
            }
            if (!empty($class)) {
                if (empty($options['class'])) {
                    $options['class'] = implode(' ', $class);
                } else {
                    $options['class'] .= ' ' . implode(' ', $class);
                }
            }
            $hasChilds = !empty($item['items']);
            $menu = $this->doRenderItem($item, $hasChilds);
            if ($hasChilds) {
                $submenuTemplate = ArrayHelper::getValue($item, 'submenuTemplate', $this->submenuTemplate);
                $menu .= strtr($submenuTemplate, [
                    '{items}' => $this->renderItems($item['items']),
                ]);
            }
            if ($tag === false) {
                $lines[] = $menu;
            } else {
                $lines[] = Html::tag($tag, $menu, $options);
            }
        }
        return implode("\n", $lines);
    }

    /**
     * Renders the content of a menu item.
     * Note that the container and the sub-menus are not rendered here.
     * @param array $item the menu item to be rendered. Please refer to [[items]] to see what data might be in the item.
     * @return string the rendering result
     */
    protected function doRenderItem($item, $hasChilds) {
        if (isset($item['url'])) {
            $template = ArrayHelper::getValue($item, 'template', $this->linkTemplate);
            return strtr($template, [
                '{url}' => Html::encode(Url::to($item['url'])),
                '{label}' => $item['label'] . ($hasChilds ? '<span class="fa arrow"></span>' : ''),
                '{icon}' => (isset($item['icon']) && $item['icon'] !== false) ? '<i class="' . $item['icon'] . '"></i>' : '',
            ]);
        } else {
            $template = ArrayHelper::getValue($item, 'template', $this->labelTemplate);
            return strtr($template, [
                '{label}' => $item['label'],
            ]);
        }
    }

}
