<?php

namespace backend\models;

use yii\data\ActiveDataProvider;

/**
 * EmployeeSearch represents the model behind the search form about `backend\models\Employee`.
 */
class EmployeeSearch {

    /**
     * Creates data provider instance with search query applied
     *
     * @param string $searchQuery
     *
     * @return ActiveDataProvider
     */
    public function search($searchQuery) {
        $query = Employee::find();
        if ($searchQuery !== null) {
            $query->orFilterWhere(['like', 'username', $searchQuery])
                    ->orFilterWhere(['like', 'email', $searchQuery])
                    ->orFilterWhere(['like', 'fullname', $searchQuery]);
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
