<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\FilmActor;

/**
 * FilmActorSearch represents the model behind the search form about `backend\models\FilmActor`.
 */
class FilmActorSearch extends FilmActor {

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['id', 'country_id', 'created_by', 'updated_by', 'created_at', 'updated_at'], 'integer'],
            [['name', 'other_name', 'birthday', 'profile'], 'safe'],
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
        $query = FilmActor::find();


        if ($searchQuery !== null) {
            $query->andFilterWhere(['like', 'name', $searchQuery])
                    ->andFilterWhere(['like', 'other_name', $searchQuery]);
        }

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        return $dataProvider;
    }

}
