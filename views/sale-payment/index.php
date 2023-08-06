<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SalePaymentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sale Payments';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sale-payment-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Sale Payment', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ID',
            'ID_SALE',
            'TYPE_PAYMENT',
            'NUMBER',
            'AMOUNT',
            //'TOTAL',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, SalePayment $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'ID' => $model->ID]);
                 }
            ],
        ],
    ]); ?>


</div>
