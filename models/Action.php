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
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'action';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tid', 'pub_id'], 'required'],
            [['tid', 'status', 'pub_id', 'subid1', 'subid2', 'subid3', 'subid4', 'subid5'], 'integer'],
            [['date_created', 'date_closed'], 'safe'],
            [['sale_id'], 'string', 'max' => 255],
            [['tid'], 'unique'],
            [['sale_id'], 'unique'],
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
}
