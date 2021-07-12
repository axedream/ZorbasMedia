<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Action;

/**
 * ActionSeacrh represents the model behind the search form of `app\models\Action`.
 */
class ActionSeacrh extends Action
{

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'tid', 'status', 'pub_id', 'subid1', 'subid2', 'subid3', 'subid4', 'subid5'], 'integer'],
            [['sale_id', 'date_created', 'date_closed','date_created_start','date_created_stop'], 'safe'],
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
        $query = Action::find();

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
            'tid' => $this->tid,
            'status' => $this->status,
            'pub_id' => $this->pub_id,
            'date_created' => $this->date_created,
            'date_closed' => $this->date_closed,
            'subid1' => $this->subid1,
            'subid2' => $this->subid2,
            'subid3' => $this->subid3,
            'subid4' => $this->subid4,
            'subid5' => $this->subid5,
        ]);

        //$query->andFilterWhere(['IN', 'pub_id', $this->pub_id]);


        $query
            ->andFilterWhere(['>=', 'date_created', $this->date_created_start])
            ->andFilterWhere(['<=', 'date_created', $this->date_created_stop]);

        $query->andFilterWhere(['IN', 'sale_id', $this->sale_id]);

        return $dataProvider;
    }
}
