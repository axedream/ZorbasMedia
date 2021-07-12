<?php

use yii\helpers\Html;
use yii\grid\GridView;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use kartik\date\DatePicker;
use app\models\Action;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ActionSeacrh */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Общая таблица';
$this->params['breadcrumbs'][] = $this->title;


$status=[
    'attribute'=>'status',
    'filter'=>Action::getStatusText(),
        'content'=>function($data){
        if ($data->status) {
            $out = Action::getStatusText()[$data->status];
        } else {
            $out = "<div class='wrong'>(не задан)</div>";
        }
        return $out;

    }
];

$sale_id  = [
    'label' => 'sale_id',
    'format' => 'html',
    'headerOptions' => ['width' => '200px'],
    'filter' => Select2::widget([
        'model' => $searchModel,
        'attribute' => 'sale_id',
        'data' => ArrayHelper::map(Action::find()->asArray()->all(), 'sale_id', 'sale_id'),
        'theme' => Select2::THEME_BOOTSTRAP,
        'hideSearch' => false,
        'options' => [
            'placeholder' => '',
            'multiple' => true,
        ],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]),

    'content'=>function($data){
        if ($data->sale_id) {
            $out = $data->sale_id;
        } else {
            $out = "<div class='wrong'>(не задан)</div>";
        }
        return $out;

    }
];

$created = [
    'label' => 'Date Created',
    'headerOptions' => ['width' => '320'],
    'format' => 'date',
    'filter' => DatePicker::widget([
        'model' => $searchModel,
        'attribute' => 'date_created_start',
        'attribute2' => 'date_created_stop',
        'options' => ['placeholder' => 'C'],
        'options2' => ['placeholder' => 'ПО'],
        'type' => DatePicker::TYPE_RANGE,
        'language'=>'ru',
        'pluginOptions' => [
            'format' => 'yyyy-mm-dd',
            'autoclose' => true,
        ]
    ]),
    'content'=>function($data){
        if ($data->date_created) {
            return "<div class='text-center'>".$data->date_created."</div>";
        }else {
            return "<div class='text-center wrong'>(не задана)</div>";
        }
    }

];

?>
<div class="action-index">

    <h1><?= Html::encode($this->title) ?></h1>


    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'tid',
            $sale_id,
            $status,
            'pub_id',
            $created,
            'date_closed',
            'subid1',
            'subid2',
            'subid3',
            'subid4',
            'subid5',
        ],
    ]); ?>


</div>

