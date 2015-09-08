<?php

namespace backend\models;

use Yii;
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

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($password) {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password) {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }

    public function beforeSave($insert) {
        if (!parent::beforeSave($insert)) {
            return false;
        } else if ($this->password !== null) {
            $this->setPassword($this->password);
        }
        return true;
    }

}
