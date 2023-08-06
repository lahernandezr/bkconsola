<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SaleItemSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sale Items';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sale-item-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Sale Item', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ID',
            'ID_SALE',
            'BARCODE',
            'NAME',
            'ID_CATEGORY',
            //'ID_ITEM',
            //'PRICE_COST',
            //'PRICE_SELL',
            //'QUANTITY',
            //'ID_TAX',
            //'TAXES',
            //'TOTAL',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, SaleItem $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'ID' => $model->ID]);
                 }
            ],
        ],
    ]); ?>


</div>
