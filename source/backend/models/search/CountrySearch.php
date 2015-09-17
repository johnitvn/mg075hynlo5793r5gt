<?php

namespace backend\models\search;

use yii\data\ActiveDataProvider;
use backend\models\Country;

/**
 * CountrySearch represents the model behind the search form about `\backend\models\Country`.
 */
class CountrySearch {

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($searchQuery) {
        $query = Country::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if ($searchQuery !== null && !empty($searchQuery)) {
            $query->andFilterWhere(['like', 'name', $searchQuery]);
        }

        return $dataProvider;
    }

}
