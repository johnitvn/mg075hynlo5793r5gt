<?php

namespace backend\models;

use yii\behaviors\TimestampBehavior;
use \backend\models\base\FilmCategory as BaseFilmCategory;

/**
 * This is the model class for table "film_category".
 */
class FilmCategory extends BaseFilmCategory {

    /**
     * @inheritdoc
     */
    public function behaviors() {
        return [
            TimestampBehavior::className(),
        ];
    }

}
