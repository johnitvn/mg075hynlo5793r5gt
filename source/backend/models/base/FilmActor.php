<?php

namespace backend\models\base;

use Yii;

/**
 * This is the base-model class for table "film_actor".
 *
 * @property integer $id
 * @property string $name
 * @property integer $birthday
 * @property integer $country
 * @property string $profile
 * @property integer $created_at
 * @property integer $updated_at
 */
class FilmActor extends \yii\db\ActiveRecord
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
            [['birthday', 'country', 'created_at', 'updated_at'], 'integer'],
            [['profile'], 'string'],
            [['name'], 'string', 'max' => 255],
            [['name'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('employee', 'ID'),
            'name' => Yii::t('employee', 'Name'),
            'birthday' => Yii::t('employee', 'Birthday'),
            'country' => Yii::t('employee', 'Country'),
            'profile' => Yii::t('employee', 'Profile'),
            'created_at' => Yii::t('employee', 'Created At'),
            'updated_at' => Yii::t('employee', 'Updated At'),
        ];
    }




}
