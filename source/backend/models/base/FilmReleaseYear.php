<?php

namespace backend\models\base;

use Yii;

/**
 * This is the base-model class for table "film_release_year".
 *
 * @property integer $id
 * @property string $name
 * @property integer $created_at
 * @property integer $updated_at
 */
class FilmReleaseYear extends \yii\db\ActiveRecord
{



    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'film_release_year';
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
            [['name'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('release_year', 'ID'),
            'name' => Yii::t('release_year', 'Name'),
            'created_at' => Yii::t('release_year', 'Created At'),
            'updated_at' => Yii::t('release_year', 'Updated At'),
        ];
    }




}
