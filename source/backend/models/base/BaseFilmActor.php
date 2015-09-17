<?php

namespace backend\models\base;


use Yii;use yii\behaviors\TimestampBehavior;


/**
 * This is the model class for table "film_actor".
 *
 * @property integer $id
 * @property string $name
 * @property string $other_name
 * @property string $birthday
 * @property integer $country_id
 * @property string $profile
 * @property integer $created_at
 * @property integer $updated_at
 */
class BaseFilmActor extends \yii\db\ActiveRecord
 {
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'film_actor';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['country_id', 'created_at', 'updated_at'], 'integer'],
            [['profile'], 'string'],
            [['name', 'other_name', 'birthday'], 'string', 'max' => 255],
            [['name'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'other_name' => Yii::t('app', 'Other Name'),
            'birthday' => Yii::t('app', 'Birthday'),
            'country_id' => Yii::t('app', 'Country ID'),
            'profile' => Yii::t('app', 'Profile'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
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
