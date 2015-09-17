<?php

namespace backend\models;

use \backend\models\base\BaseFilmActor;

/**
 * This is the model class for table "film_actor".
 */
class FilmActor extends BaseFilmActor {

    public function getCountry() {
        return $this->hasOne(Country::className(), ['id' => 'country_id']);
    }

}
