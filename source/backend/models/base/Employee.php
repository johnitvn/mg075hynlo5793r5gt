<?php

namespace backend\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the base-model class for table "employee".
 *
 * @property integer $id
 * @property string $username
 * @property string $email
 * @property string $avatar
 * @property string $fullname
 * @property integer $gender
 * @property string $birthday
 * @property string $phone
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 */
class Employee extends \yii\db\ActiveRecord {

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
     */
    public $confirm_password;

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'employee';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            // username rules
            'usernameRequired' => ['username', 'required', 'on' => ['register', 'create', 'verify', 'update']],
            'usernameMatch' => ['username', 'match', 'pattern' => self::USERNAME_REGEXP],
            'usernameLength' => ['username', 'string', 'min' => 3, 'max' => 255],
            'usernameUnique' => ['username', 'unique', 'message' => Yii::t('employee', 'This username has already been taken')],
            'usernameTrim' => ['username', 'trim'],
            // email rules
            'emailRequired' => ['email', 'required', 'on' => ['register', 'verify', 'create', 'update']],
            'emailPattern' => ['email', 'email'],
            'emailLength' => ['email', 'string', 'max' => 255],
            'emailUnique' => ['email', 'unique', 'message' => Yii::t('employee', 'This email address has already been taken')],
            'emailTrim' => ['email', 'trim'],
            // password rules
            'passwordRequired' => ['password', 'required', 'on' => ['register']],
            'passwordLength' => ['password', 'string', 'min' => 6, 'on' => ['register']],
            // password rules
            'confirmPasswordRequired' => ['confirm_password', 'required', 'on' => ['register']],
            'confirmPasswordLength' => ['confirm_password', 'compare', 'compareAttribute' => 'password', 'message' => Yii::t("employee", "Comfirm Passwords don't match")],
            // fullname rule 
            'fullnameRequired' => ['fullname', 'required', 'on' => ['register', 'create', 'update']],
            'fullnameLength' => ['fullname', 'string', 'max' => 255],
            // status rule
            'statusDefault' => ['status', 'default', 'value' => self::STATUS_ACTIVE],
            'statusRange' => ['status', 'in', 'range' => [self::STATUS_ACTIVE, self::STATUS_BLOCK, self::STATUS_DELETED]],
            // phone rule
            'phoneLength' => ['phone', 'string', 'max' => 16],
            // avatar rule
            'avatarLength' => ['avatar', 'string', 'max' => 32],
            //birthday rules
            'birtdaySafe' => ['birthday', 'safe'],
            // gender rules
            'genderDefault' => ['gender', 'default', 'value' => self::FAMALE],
            'genderRange' => ['gender', 'in', 'range' => [self::MALE, self::FAMALE]],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => Yii::t('employee', 'ID'),
            'username' => Yii::t('employee', 'Username'),
            'email' => Yii::t('employee', 'Email'),
            'avatar' => Yii::t('employee', 'Avatar'),
            'fullname' => Yii::t('employee', 'Fullname'),
            'gender' => Yii::t('employee', 'Gender'),
            'birthday' => Yii::t('employee', 'Birthday'),
            'phone' => Yii::t('employee', 'Phone'),
            'auth_key' => Yii::t('employee', 'Auth Key'),
            'password_hash' => Yii::t('employee', 'Password Hash'),
            'password_reset_token' => Yii::t('employee', 'Password Reset Token'),
            'status' => Yii::t('employee', 'Status'),
            'created_at' => Yii::t('employee', 'Created At'),
            'updated_at' => Yii::t('employee', 'Updated At'),
        ];
    }

    /** @inheritdoc */
    public function scenarios() {
        return [
            'register' => ['username', 'email', 'password'],
            'verify' => ['username', 'email'],
            'create' => ['username', 'email', 'password'],
            'update' => ['username', 'email', 'password'],
            'change_password' => ['password'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function behaviors() {
        return [
            TimestampBehavior::className(),
        ];
    }

}
