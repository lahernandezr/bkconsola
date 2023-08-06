<?php

use app\models\Item;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ItemSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Items';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="item-index">

    <p>
        <?= Html::a('Create Item', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'rowOptions' => function($model){
            if($model->ID_PARENT == $model->ID){
                return ['class' => 'table-success font-weight-bold'];
            }
        },
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'IMAGE',
                'format' => 'raw',
                'headerOptions' => ['style' => 'width:90px; white-space:normal; word-break:break-word;'],
                'value' => function($model){
                    return Html::img(yii\helpers\Url::to("../uploads/items/".$model->IMAGE), ['height'=>'70px',]);
                },
            ],

            //'ID',
            'BARCODE',
            'NAME',
            //'DESCRIPCION:ntext',            
            //'ID_CATEGORY',
            //'PRICE_COST',
            //'PRICE_SELL',
            // [
            //     'label' => 'Price + Tax',                
            //     'value' => 'priceTax',
            //     'format' => 'currency',                
            //     'headerOptions' => ['style' => 'width:90px; white-space:nowrap; text-overflow:ellipsis; overflow:hidden;'],
            // ],

            [
                'attribute' => 'ID_TAX',
                'value' => 'tax.NAME',
                'headerOptions' => ['style' => 'width:90px; white-space:nowrap; text-overflow:ellipsis; overflow:hidden;'],
            ],   
            'PRICE_TAX:currency',                 
            [
                'attribute' => 'ID_CATEGORY',
                'value' => 'category.NAME',

            ],                
            //'IMAGE:ntext',
            //'ID_TAX',
            //'ON_SALE:boolean',
            //'INIT',
            //'END', 
            'ACTIVE:boolean',
            
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Item $model, $key, $index, $column) {

                    if ($action === 'update') {
                        if($model->ID_PARENT <> $model->ID){
                            return Url::toRoute([$action, 'ID' => $model->ID_PARENT,'CHILD' => true]);
                        }
                    }
            
                    return Url::toRoute([$action, 'ID' => $model->ID]);
                 }
            ],
        ],
    ]); ?>


</div>
