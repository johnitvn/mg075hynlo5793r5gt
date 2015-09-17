<?php

namespace backend\models\base;


use yii\behaviors\TimestampBehavior;


/**
 * This is the model class for table "employee".
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
class BaseEmployee extends \yii\db\ActiveRecord
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
            [['password_reset_token'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'email' => 'Email',
            'avatar' => 'Avatar',
            'fullname' => 'Fullname',
            'gender' => 'Gender',
            'birthday' => 'Birthday',
            'phone' => 'Phone',
            'auth_key' => 'Auth Key',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
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
