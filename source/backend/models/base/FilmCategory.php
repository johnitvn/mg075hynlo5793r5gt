<?php

namespace backend\models\base;

use Yii;

/**
 * This is the base-model class for table "film_category".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property integer $created_at
 * @property integer $updated_at
 */
class FilmCategory extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'film_category';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['name'], 'required'],
            [['created_at', 'updated_at'], 'integer'],
            [['name', 'description'], 'string', 'max' => 255],
            [['name'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => Yii::t('employee', 'ID'),
            'name' => Yii::t('employee', 'Name'),
            'description' => Yii::t('employee', 'Description'),
            'created_at' => Yii::t('employee', 'Created At'),
            'updated_at' => Yii::t('employee', 'Updated At'),
        ];
    }

}
