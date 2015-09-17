<?php

namespace backend\models\search;

use yii\data\ActiveDataProvider;
use backend\models\FilmCategory;

/**
 * FilmCategorySearch represents the model behind the search form about `backend\models\FilmCategory`.
 */
class FilmCategorySearch {

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
            $query->orFilterWhere(['like', 'name', $searchQuery]);
        }
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 10,
            ],
            'sort' => false,
        ]);
        return $dataProvider;
    }

}
