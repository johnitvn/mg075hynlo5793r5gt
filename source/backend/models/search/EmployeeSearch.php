<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Employee;

/**
 * EmployeeSearch represents the model behind the search form about `backend\models\Employee`.
 */
class EmployeeSearch extends Employee {

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['id', 'gender', 'birthday', 'status', 'created_by', 'updated_by', 'created_at', 'updated_at'], 'integer'],
            [['username', 'email', 'avatar', 'fullname', 'phone', 'auth_key', 'password_hash', 'password_reset_token'], 'safe'],
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
        $query = Employee::find();

        $query->where('status > 0');
        if ($searchQuery !== null) {
            $query->andFilterWhere(['like', 'username', $searchQuery])
                    ->andFilterWhere(['like', 'email', $searchQuery])
                    ->andFilterWhere(['like', 'fullname', $searchQuery]);
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
