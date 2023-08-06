<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use app\models\Store;

/* @var $this yii\web\View */
/* @var $searchModel app\models\StoreSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sucursales';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="store-index">

    <p>
        <?= Html::a('Crear Sucursal', ['create'], ['class' => 'btn btn-success']) ?>
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
                    return Html::img(yii\helpers\Url::to("../uploads/stores/".$model->IMAGE), ['height'=>'70px',]);
                },
            ],
            // 'ID',
            'NAME',
            'ADDRESS',
            // 'IMAGE:ntext',
            // 'DATA_JSON:ntext',
            'ACTIVE:boolean',
            [
                'class' => ActionColumn::class,
                'urlCreator' => function ($action, Store $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'ID' => $model->ID]);
                 }
            ],
        ],
    ]); ?>


</div>
