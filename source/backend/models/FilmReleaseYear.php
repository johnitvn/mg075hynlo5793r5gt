<?php

namespace backend\models;

use yii\behaviors\TimestampBehavior;
use \backend\models\base\FilmReleaseYear as BaseFilmReleaseYear;

/**
 * This is the model class for table "film_release_year".
 */
class FilmReleaseYear extends BaseFilmReleaseYear {

    /**
     * @inheritdoc
     */
    public function behaviors() {
        return [
            TimestampBehavior::className(),
        ];
    }

}
