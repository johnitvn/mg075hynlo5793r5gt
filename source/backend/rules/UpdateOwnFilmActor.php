<?php

namespace backend\rules;

use yii\rbac\Rule;

/**
 * 
 */
class UpdateOwnFilmActor extends Rule {

    public $name = 'update_own_film_actor';

    /**
     * @param string|integer $user the user ID.
     * @param Item $item the role or permission that this rule is associated with
     * @param array $params parameters passed to ManagerInterface::checkAccess().
     * @return boolean a value indicating whether the rule permits the role or permission it is associated with.
     */
    public function execute($user, $item, $params) {
        return isset($params['FilmActor']) ? $params['FilmActor']->createdBy == $user : false;
    }

}
