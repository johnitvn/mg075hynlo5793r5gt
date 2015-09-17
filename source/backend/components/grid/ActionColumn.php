<?php

namespace backend\components\grid;

use dmstr\helpers\Html;
use Yii;

/**
 * Class ActionColumn
 */
class ActionColumn extends \yii\grid\ActionColumn {

    /**
     * Initializes the default button rendering callbacks.
     */
    protected function initDefaultButtons() {
        if (!isset($this->buttons['view'])) {
            $this->buttons['view'] = [$this, 'renderViewButton'];
        }

        if (!isset($this->buttons['update'])) {
            $this->buttons['update'] = [$this, 'renderUpdateButton'];
        }

        if (!isset($this->buttons['delete'])) {
            $this->buttons['delete'] = [$this, 'renderDeleteButton'];
        }
    }

    public function renderViewButton($url, $model, $key) {
        $options = array_merge([
            'title' => Yii::t('yii', 'View'),
            'aria-label' => Yii::t('yii', 'View'),
            'data-pjax' => '0',
                ], $this->buttonOptions);

        return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', $url, $options);
    }

    public function renderUpdateButton($url, $model, $key) {
        $options = array_merge([
            'title' => Yii::t('yii', 'Update'),
            'aria-label' => Yii::t('yii', 'Update'),
            'data-pjax' => '0',
                ], $this->buttonOptions);

        return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, $options);
    }

    public function renderDeleteButton($url, $model, $key) {
        $options = array_merge([
            'title' => Yii::t('yii', 'Delete'),
            'aria-label' => Yii::t('yii', 'Delete'),
            'data-confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
            'data-method' => 'post',
            'data-pjax' => '0',
                ], $this->buttonOptions);

        return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, $options);
    }

}
