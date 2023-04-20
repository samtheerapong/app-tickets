<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Job;

/**
 * JobSearch represents the model behind the search form of `app\models\Job`.
 */
class JobSearch extends Job
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'ticket_id', 'job_quantity', 'job_location_id', 'job_status_id'], 'integer'],
            [['job_discrption', 'job_request_at', 'job_broken_at', 'job_remask', 'job_image'], 'safe'],
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
        $query = Job::find();

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
            'ticket_id' => $this->ticket_id,
            'job_quantity' => $this->job_quantity,
            'job_location_id' => $this->job_location_id,
            'job_status_id' => $this->job_status_id,
        ]);

        $query->andFilterWhere(['like', 'job_discrption', $this->job_discrption])
            ->andFilterWhere(['like', 'job_request_at', $this->job_request_at])
            ->andFilterWhere(['like', 'job_broken_at', $this->job_broken_at])
            ->andFilterWhere(['like', 'job_remask', $this->job_remask])
            ->andFilterWhere(['like', 'job_image', $this->job_image]);

        return $dataProvider;
    }
}
