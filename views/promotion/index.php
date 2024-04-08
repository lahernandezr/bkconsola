<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use app\models\Promotion;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PromotionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Promociones';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="promotion-index">

    <p>
        <?= Html::a('Crear Promoción', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'IMAGE',
                'format' => 'raw',
                'headerOptions' => ['style' => 'width:90px; white-space:normal; word-break:break-word;'],
                'value' => function($model){
                    return Html::img(yii\helpers\Url::to("../uploads/promos/".$model->IMAGE), ['height'=>'70px',]);
                },
            ],

            // 'ID',
            'CODE',
            'NAME',
            //'DESCRIPTION',
            //'ID_TYPE_PROMOTION',
            //'VALUE',
            //'TYPE_DISC',
            //'ID_ITEM',
            //'INIT',
            'END',
            //'IMAGE:ntext',
            //'LINK:ntext',
            'LIMIT_EXCHANGE',
            'REDIMM',
            //'ACTIVE:boolean',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Promotion $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'ID' => $model->ID]);
                 }
            ],
        ],
    ]); ?>


</div>
