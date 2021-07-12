<?php

use yii\db\Migration;
use app\models\Action;
use app\models\Subid;

/**
 * Class m210712_062625_insertData
 */
class m210712_062625_insertData extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $dataSubid = [
            [12, 'oioioi', 1],
            [25, 'qweqdwe', 2],
            [25, 'cvbcb', 3],
            [25, '34v3', 4],
            [12, 'dse34', 5],
            [12, '34v3', 3]
        ];

        foreach ($dataSubid as $k) {
            $model = new Subid();
            $model->pub_id = $k[0];
            $model->keyword = $k[1];
            $model->type = $k[2];
            $model->save();
            unset($model);
        }

        $dataAction = [
            [12, '1254ieu', 0, 12, '2021-07-07 12:05:05', null, 1, null, 6, null, null],
            [17, 'rtertrer', 2, 25, '2021-05-12 23:15:43', '2021-06-12 05:04:03', null, 2, 3, 4, null],
            [19, 'rt12rt1', 2, 12, '2021-06-22 12:03:05', '2021-06-24 17:04:03', null, null, null, null, 5],
            [22, '12r22r22', 1, 12, '2021-07-01 10:00:00', '2021-07-08 06:34:12', 1, null, 6, null, 5]
        ];

        foreach ($dataAction as $k) {
            $model = new Action();
            $model->tid = $k[0];
            $model->sale_id = $k[1];
            $model->status = $k[2];
            $model->pub_id = $k[3];
            $model->date_created = $k[4];
            $model->date_closed = $k[5];
            $model->subid1  = $k[6];
            $model->subid2 = $k[7];
            $model->subid3 = $k[8];
            $model->subid4 = $k[9];
            $model->subid5 = $k[10];
            /*
            if (!$model->save()) {
                var_dump($model->errors);
            }
            */
            $model->save();
            unset($model);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210712_062625_insertData cannot be reverted.\n";

        return true;
    }
}
