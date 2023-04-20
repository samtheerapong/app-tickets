<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Location;

/**
 * LocationSearch represents the model behind the search form of `app\models\Location`.
 */
class LocationSearch extends Location
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'location_main_id', 'location_status'], 'integer'],
            [['location_name'], 'safe'],
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
    public function search($params)
    {
        $query = Location::find();

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
            'location_main_id' => $this->location_main_id,
            'location_status' => $this->location_status,
        ]);

        $query->andFilterWhere(['like', 'location_name', $this->location_name]);

        return $dataProvider;
    }
}
