<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "action".
 *
 * @property int $id
 * @property int $tid
 * @property string|null $sale_id
 * @property int $status
 * @property int $pub_id
 * @property string|null $date_created
 * @property string|null $date_closed
 * @property int|null $subid1
 * @property int|null $subid2
 * @property int|null $subid3
 * @property int|null $subid4
 * @property int|null $subid5
 */
class Action extends \yii\db\ActiveRecord
{

    public $date_created_stop,$date_created_start;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'action';
    }


    public static function getStatusText()
    {
        return
            [
                1=>"На проверке",
                2=>"Подтверждено",
                3=>"Отклонено"
            ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tid', 'pub_id'], 'required'],
            [['tid', 'status', 'pub_id'], 'integer'],
            [['date_created', 'date_closed'], 'safe'],
            [['sale_id'], 'string', 'max' => 255],
            [['tid'], 'unique'],
            [['sale_id'], 'unique'],
            [['subid1', 'subid2', 'subid3', 'subid4', 'subid5'],'safe']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tid' => 'Tid',
            'sale_id' => 'Sale ID',
            'status' => 'Status',
            'pub_id' => 'Pub ID',
            'date_created' => 'Date Created',
            'date_closed' => 'Date Closed',
            'subid1' => 'Subid1',
            'subid2' => 'Subid2',
            'subid3' => 'Subid3',
            'subid4' => 'Subid4',
            'subid5' => 'Subid5',
        ];
    }

    public function getSubid1s()
    {
        if (Subid::find()->where(['id'=>$this->subid1,'type'=>1])->exists()) {
            $model = Subid::find()->where(['id'=>$this->subid1,'type'=>1])->one();
            return $model;
        }
        return false;
    }

    public function getSubid2s()
    {
        if (Subid::find()->where(['id'=>$this->subid2,'type'=>2])->exists()) {
            $model = Subid::find()->where(['id'=>$this->subid2,'type'=>2])->one();
            return $model;
        }
        return false;
    }

    public function getSubid3s()
    {
        if (Subid::find()->where(['id'=>$this->subid3,'type'=>3])->exists()) {
            $model = Subid::find()->where(['id'=>$this->subid3,'type'=>3])->one();
            return $model;
        }
        return false;
    }

    public function getSubid4s()
    {
        if (Subid::find()->where(['id'=>$this->subid4,'type'=>4])->exists()) {
            $model = Subid::find()->where(['id'=>$this->subid4,'type'=>4])->one();
            return $model;
        }
        return false;
    }

    public function getSubid5s()
    {
        if (Subid::find()->where(['id'=>$this->subid5,'type'=>5])->exists()) {
            $model = Subid::find()->where(['id'=>$this->subid5,'type'=>5])->one();
            return $model;
        }
        return false;
    }



}
