<?php

namespace backend\models;

use \backend\models\base\Employee as BaseEmployee;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "employee".
 */
class Employee extends BaseEmployee implements IdentityInterface {

    /**
     * 
     * @return string
     */
    public function getAuthKey() {
        return $this->auth_key;
    }

    /**
     * 
     * @return integer
     */
    public function getId() {
        return $this->id;
    }

    /**
     * 
     * @param string $authKey
     * @return boolean
     */
    public function validateAuthKey($authKey) {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * 
     * @param integer $id
     * @return Employee
     */
    public static function findIdentity($id) {
        return Employee::findOne(['id' => $id]);
    }

    /**
     * This function is not implemented
     * @param string $token
     * @param string $type
     * @throws NotSupportedException
     */
    public static function findIdentityByAccessToken($token, $type = null) {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

}
