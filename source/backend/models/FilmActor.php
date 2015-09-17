<?php

namespace backend\models;

use backend\models\Country;
use backend\models\base\FilmActor as BaseFilmActor;

/**
 * This is the model class for table "film_actor".
 */
class FilmActor extends BaseFilmActor {

    /**
     *
     * @var type 
     */
    public $birthdayUpdatting = true;

    /**
     *
     * @var type 
     */
    public $countryUpdating = true;

    /**
     *
     * @var type 
     */
    public $profileUpdating = true;

    public function init() {
        parent::init();
        if ($this->birthday == null) {
            $this->birthdayUpdatting = true;
        }
        if ($this->country_id == null) {
            $this->countryUpdating = true;
        }
        if ($this->profile == null) {
            $this->profileUpdating = true;
        }
    }

    public function beforeValidate() {
        if ($this->birthdayUpdatting) {
            $this->birthday = null;
        } else {
            $this->birthday = strtotime($this->birthday);
            if ($this->birthday === FALSE) {
                $this->addError('birthday', 'Birthday is invalidate');
                return false;
            }
        }
        if ($this->countryUpdating) {
            $this->country_id = null;
        }
        if ($this->profileUpdating) {
            $this->profile = null;
        }
        return parent::beforeValidate();
    }

    public function getCountry() {
        return $this->hasOne(Country::className(), ['id' => 'country_id']);
    }

}
