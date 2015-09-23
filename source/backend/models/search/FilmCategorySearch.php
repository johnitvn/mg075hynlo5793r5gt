<?php

namespace backend\models\search;

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
            [['id', 'created_at', 'updated_at'], 'integer'],
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
     * @param string $searchQuery
     *
     * @return ActiveDataProvider
     */
    public function search($searchQuery) {
        $query = FilmCategory::find();


        if ($searchQuery !== null) {
            $query->andFilterWhere(['like', 'name', $searchQuery]);
        }

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        return $dataProvider;
    }

}
