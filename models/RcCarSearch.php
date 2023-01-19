<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * RcCarSearch represents the model behind the search form of `app\models\RcCar`.
 */
class RcCarSearch extends RcCar
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'is_running', 'is_lipo', 'is_nimh', 'needs_work'], 'integer'],
            [['name', 'make', 'model', 'company', 'distributor', 'notes', 'create_ts'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
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
    public function search(array $params): ActiveDataProvider
    {
        $query = RcCar::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'is_running' => $this->is_running,
            'is_lipo' => $this->is_lipo,
            'is_nimh' => $this->is_nimh,
            'needs_work' => $this->needs_work,
            'create_ts' => $this->create_ts,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'make', $this->make])
            ->andFilterWhere(['like', 'model', $this->model])
            ->andFilterWhere(['like', 'company', $this->company])
            ->andFilterWhere(['like', 'distributor', $this->distributor])
            ->andFilterWhere(['like', 'notes', $this->notes]);

        return $dataProvider;
    }
}
