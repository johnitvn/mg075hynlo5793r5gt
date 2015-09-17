<?php

namespace backend\models;

use Yii;
use \backend\models\base\Employee as BaseEmployee;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "employee".
 */
class Employee extends BaseEmployee implements IdentityInterface {

    const MALE = 0;
    const FAMALE = 1;
    const STATUS_DELETED = 0;
    const STATUS_BLOCK = 5;
    const STATUS_ACTIVE = 10;
    const USERNAME_REGEXP = '/^[a-zA-Z0-9]+$/';

    /**
     *
     * @var string
     */
    public $password;

    /**
     *
     * @var string
     * 
     */
    public $confirm_password;

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            // username rules
            'usernameRequired' => ['username', 'required'],
            'usernameMatch' => ['username', 'match', 'pattern' => self::USERNAME_REGEXP],
            'usernameLength' => ['username', 'string', 'min' => 3, 'max' => 255],
            'usernameUnique' => ['username', 'unique', 'message' => Yii::t('employee', 'This username has already been taken')],
            'usernameTrim' => ['username', 'trim'],
            // email rules
            'emailRequired' => ['email', 'required'],
            'emailPattern' => ['email', 'email'],
            'emailLength' => ['email', 'string', 'max' => 255],
            'emailUnique' => ['email', 'unique', 'message' => Yii::t('employee', 'This email address has already been taken')],
            'emailTrim' => ['email', 'trim'],
            // password rules
            'passwordRequired' => ['password', 'required'],
            'passwordLength' => ['password', 'string', 'min' => 6, 'on' => ['register']],
            // password rules
            'confirmPasswordRequired' => ['confirm_password', 'required'],
            'confirmPasswordLength' => ['confirm_password', 'compare', 'compareAttribute' => 'password', 'message' => Yii::t("employee", "Comfirm Passwords don't match")],
            // fullname rule 
            'fullnameRequired' => ['fullname', 'required'],
            'fullnameLength' => ['fullname', 'string', 'min' => 3, 'max' => 255],
            // status rule
            'statusDefault' => ['status', 'default', 'value' => self::STATUS_ACTIVE],
            'statusRange' => ['status', 'in', 'range' => [self::STATUS_ACTIVE, self::STATUS_BLOCK, self::STATUS_DELETED]],
            // phone rule
            'phoneLength' => ['phone', 'string', 'max' => 16],
            // avatar rule
            'avatarLength' => ['avatar', 'string', 'max' => 32],
            //birthday rules
            'birtdayDate' => ['birthday', 'date'],
            // gender rules
            'genderDefault' => ['gender', 'default', 'value' => self::FAMALE],
            'genderRange' => ['gender', 'in', 'range' => [self::MALE, self::FAMALE]],
        ];
    }

    /** @inheritdoc */
    public function scenarios() {
        return [
            'create' => ['fullname', 'username', 'email', 'password', 'confirm_password'],
            'update' => ['fullname', 'email', 'phone', 'gender', 'birthday'],
            'change_password' => ['password'],
        ];
    }

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

    public static function findByUsername($username) {
        return Employee::findOne(['username' => $username]);
    }

}
