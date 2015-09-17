<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\FilmCategory;

/**
 * FilmCategorySearch represents the model behind the search form about `backend\models\FilmCategory`.
 */
class FilmCategorySearch extends FilmCategory {

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['id'], 'integer'],
            [['name', 'description'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios() {
// bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params) {
        $query = FilmCategory::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
// uncomment the following line if you do not want to any records when validation fails
// $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
                ->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }

}