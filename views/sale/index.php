<?php

use app\models\Sale;
use yii\bootstrap4\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SaleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sales';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sale-index">

    <p>
        <?= Html::a('Create Sale', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ID',
            'ID_USER',
            //'ID_ADDRESS',
            'TYPE',
            'SUBTOTAL',
            'TAXES',
            'TOTAL',
            //'TENDER',
            //'PAYMENTS',
            //'CHANGED',
            //'NOTES',
            //'CREATED_AT',
            //'ACTIVE:boolean',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Sale $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'ID' => $model->ID]);
                 }
            ],
        ],
    ]); ?>


</div>
