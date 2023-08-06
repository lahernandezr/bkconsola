<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use app\models\TypePayment;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TypePaymentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Type Payments';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="type-payment-index">

    <p>
        <?= Html::a('Create Type Payment', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ID',
            'NAME',
            'ACTIVE:boolean',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, TypePayment $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'ID' => $model->ID]);
                 }
            ],
        ],
    ]); ?>


</div>
