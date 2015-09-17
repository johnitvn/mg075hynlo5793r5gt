<?php

namespace backend\models\base;


use yii\behaviors\TimestampBehavior;


/**
 * This is the model class for table "country".
 *
 * @property integer $id
 * @property string $name
 * @property integer $created_at
 * @property integer $updated_at
 */
class BaseCountry extends \yii\db\ActiveRecord
 {
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'country';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['created_at', 'updated_at'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['name'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
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
