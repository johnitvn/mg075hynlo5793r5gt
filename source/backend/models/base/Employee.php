<?php

namespace backend\models\base;

use Yii;

/**
 * This is the base-model class for table "employee".
 *
 * @property integer $id
 * @property string $username
 * @property string $email
 * @property string $avatar
 * @property string $fullname
 * @property integer $gender
 * @property integer $birthday
 * @property string $phone
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 */
class Employee extends \yii\db\ActiveRecord
{



    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'employee';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'email', 'fullname', 'auth_key', 'password_hash'], 'required'],
            [['gender', 'birthday', 'status', 'created_at', 'updated_at'], 'integer'],
            [['username', 'email', 'fullname', 'password_hash', 'password_reset_token'], 'string', 'max' => 255],
            [['avatar', 'auth_key'], 'string', 'max' => 32],
            [['phone'], 'string', 'max' => 16],
            [['username'], 'unique'],
            [['email'], 'unique'],
            [['password_reset_token'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('release_year', 'ID'),
            'username' => Yii::t('release_year', 'Username'),
            'email' => Yii::t('release_year', 'Email'),
            'avatar' => Yii::t('release_year', 'Avatar'),
            'fullname' => Yii::t('release_year', 'Fullname'),
            'gender' => Yii::t('release_year', 'Gender'),
            'birthday' => Yii::t('release_year', 'Birthday'),
            'phone' => Yii::t('release_year', 'Phone'),
            'auth_key' => Yii::t('release_year', 'Auth Key'),
            'password_hash' => Yii::t('release_year', 'Password Hash'),
            'password_reset_token' => Yii::t('release_year', 'Password Reset Token'),
            'status' => Yii::t('release_year', 'Status'),
            'created_at' => Yii::t('release_year', 'Created At'),
            'updated_at' => Yii::t('release_year', 'Updated At'),
        ];
    }




}
