<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Action;
use yii\db\ActiveQuery;

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
            [['id', 'tid', 'status', 'pub_id'], 'integer'],
            [['sale_id', 'date_created', 'date_closed','date_created_start','date_created_stop','subid1', 'subid2', 'subid3', 'subid4', 'subid5'], 'safe'],
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
            //'subid1' => $this->subid1,
        ]);

        if ($this->subid1!='') {
            $query->andWhere(['IN','subid1',$this->subid1]);
        }
        if ($this->subid2!='') {
            $query->andWhere(['IN','subid2',$this->subid2]);
        }
        if ($this->subid3!='') {
            $query->andWhere(['IN','subid3',$this->subid3]);
        }
        if ($this->subid4!='') {
            $query->andWhere(['IN','subid4',$this->subid4]);
        }
        if ($this->subid5!='') {
            $query->andWhere(['IN','subid5',$this->subid5]);
        }

        /*
         * это был вариант только с текстовым поиском
        if ($this->subid1!='') {
            if (Subid::find()->where(['like','keyword',$this->subid1,'type'=>1])->exists()) {
                $s1array = Subid::find()->select('id')->where(['like','keyword',$this->subid1,'type'=>1])->asArray()->all();
                if ($s1array) {
                    $s1arId =[];
                    foreach ($s1array as $key => $value) { array_push($s1arId,$value['id']); }
                    $query->andWhere(['IN','subid1',$s1arId]);
                }

            }
        }

        if ($this->subid2!='') {
            if (Subid::find()->where(['like','keyword',$this->subid2,'type'=>2])->exists()) {
                $s1array = Subid::find()->select('id')->where(['like','keyword',$this->subid2,'type'=>2])->asArray()->all();
                if ($s1array) {
                    $s1arId =[];
                    foreach ($s1array as $key => $value) { array_push($s1arId,$value['id']); }
                    $query->andWhere(['IN','subid2',$s1arId]);
                }

            }
        }


        if ($this->subid3!='') {
            if (Subid::find()->where(['like','keyword',$this->subid3,'type'=>3])->exists()) {
                $s1array = Subid::find()->select('id')->where(['like','keyword',$this->subid3,'type'=>3])->asArray()->all();
                if ($s1array) {
                    $s1arId =[];
                    foreach ($s1array as $key => $value) { array_push($s1arId,$value['id']); }
                    $query->andWhere(['IN','subid3',$s1arId]);
                }

            }
        }

        if ($this->subid4!='') {
            if (Subid::find()->where(['like','keyword',$this->subid4,'type'=>4])->exists()) {
                $s1array = Subid::find()->select('id')->where(['like','keyword',$this->subid4,'type'=>4])->asArray()->all();
                if ($s1array) {
                    $s1arId =[];
                    foreach ($s1array as $key => $value) { array_push($s1arId,$value['id']); }
                    $query->andWhere(['IN','subid4',$s1arId]);
                }

            }
        }

        if ($this->subid5!='') {
            if (Subid::find()->where(['like','keyword',$this->subid5,'type'=>5])->exists()) {
                $s1array = Subid::find()->select('id')->where(['like','keyword',$this->subid5,'type'=>5])->asArray()->all();
                if ($s1array) {
                    $s1arId =[];
                    foreach ($s1array as $key => $value) { array_push($s1arId,$value['id']); }
                    $query->andWhere(['IN','subid5',$s1arId]);
                }

            }
        }
        */


        $query
            ->andFilterWhere(['>=', 'date_created', $this->date_created_start])
            ->andFilterWhere(['<=', 'date_created', $this->date_created_stop]);

        $query->andFilterWhere(['IN', 'sale_id', $this->sale_id]);

        return $dataProvider;
    }

}
