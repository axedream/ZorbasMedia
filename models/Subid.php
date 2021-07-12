<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "subid".
 *
 * @property int $id
 * @property int $pub_id
 * @property string $keyword
 * @property int $type
 */
class Subid extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'subid';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pub_id', 'keyword', 'type'], 'required'],
            [['pub_id', 'type'], 'integer'],
            [['keyword'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'pub_id' => 'Pub ID',
            'keyword' => 'Keyword',
            'type' => 'Type',
        ];
    }
}
