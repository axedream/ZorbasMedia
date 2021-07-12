<?php

use yii\helpers\Html;
use yii\grid\GridView;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use kartik\date\DatePicker;
use app\models\Action;
use app\models\Subid;

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

$b1=[
    'attribute'=>'subid1',
    'headerOptions' => ['width' => '150px'],
    'filter' => Select2::widget([
        'model' => $searchModel,
        'attribute' => 'subid1',
        'data' => ArrayHelper::map(Subid::find()->where(['type'=>1])->asArray()->all(), 'id', 'keyword'),
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
        $out = ($data->subid1s) ? $data->subid1s->keyword : "<div class='wrong'>(не задан)</div>";
        return $out;
    }
];

$b2=[
    'attribute'=>'subid2',
    'headerOptions' => ['width' => '150px'],
    'filter' => Select2::widget([
        'model' => $searchModel,
        'attribute' => 'subid2',
        'data' => ArrayHelper::map(Subid::find()->where(['type'=>2])->asArray()->all(), 'id', 'keyword'),
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
        $out = ($data->subid2s) ? $data->subid2s->keyword : "<div class='wrong'>(не задан)</div>";
        return $out;
    }
];

$b3=[
    'attribute'=>'subid3',
    'headerOptions' => ['width' => '150px'],
    'filter' => Select2::widget([
        'model' => $searchModel,
        'attribute' => 'subid3',
        'data' => ArrayHelper::map(Subid::find()->where(['type'=>3])->asArray()->all(), 'id', 'keyword'),
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
        $out = ($data->subid3s) ? $data->subid3s->keyword : "<div class='wrong'>(не задан)</div>";
        return $out;
    }
];

$b4=[
    'attribute'=>'subid4',
    'headerOptions' => ['width' => '150px'],
    'filter' => Select2::widget([
        'model' => $searchModel,
        'attribute' => 'subid4',
        'data' => ArrayHelper::map(Subid::find()->where(['type'=>4])->asArray()->all(), 'id', 'keyword'),
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
        $out = ($data->subid4s) ? $data->subid4s->keyword : "<div class='wrong'>(не задан)</div>";
        return $out;
    }
];

$b5=[
    'attribute'=>'subid5',
    'headerOptions' => ['width' => '150px'],
    'filter' => Select2::widget([
        'model' => $searchModel,
        'attribute' => 'subid5',
        'data' => ArrayHelper::map(Subid::find()->where(['type'=>5])->asArray()->all(), 'id', 'keyword'),
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
        $out = ($data->subid5s) ? $data->subid5s->keyword : "<div class='wrong'>(не задан)</div>";
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
            $b1,
            $b2,
            $b3,
            $b4,
            $b5,
        ],
    ]); ?>


</div>

