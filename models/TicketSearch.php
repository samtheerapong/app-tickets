<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Ticket;

/**
 * TicketSearch represents the model behind the search form of `app\models\Ticket`.
 */
class TicketSearch extends Ticket
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'ticket_requester_id', 'ticket_department_id', 'ticket_progress'], 'integer'],
            [['ticket_number', 'ticket_date', 'ticket_title', 'ticket_description', 'ticket_remask', 'ticket_ref', 'created_at', 'created_by', 'updated_at', 'updated_by', 'jobs'], 'safe'],
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
        $query = Ticket::find();

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
            'ticket_requester_id' => $this->ticket_requester_id,
            'ticket_department_id' => $this->ticket_department_id,
            'ticket_progress' => $this->ticket_progress,
        ]);

        $query->andFilterWhere(['like', 'ticket_number', $this->ticket_number])
            ->andFilterWhere(['like', 'ticket_date', $this->ticket_date])
            ->andFilterWhere(['like', 'ticket_title', $this->ticket_title])
            ->andFilterWhere(['like', 'ticket_description', $this->ticket_description])
            ->andFilterWhere(['like', 'ticket_remask', $this->ticket_remask])
            ->andFilterWhere(['like', 'ticket_ref', $this->ticket_ref])
            ->andFilterWhere(['like', 'created_at', $this->created_at])
            ->andFilterWhere(['like', 'created_by', $this->created_by])
            ->andFilterWhere(['like', 'updated_at', $this->updated_at])
            ->andFilterWhere(['like', 'updated_by', $this->updated_by])
            ->andFilterWhere(['like', 'jobs', $this->jobs]);

        return $dataProvider;
    }
}
