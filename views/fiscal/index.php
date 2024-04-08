<?php

use yii\bootstrap4\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use app\models\Fiscal;

/* @var $this yii\web\View */
/* @var $searchModel app\models\FiscalSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Fiscals';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fiscal-index">

    <p>
        <?= Html::a('Create Fiscal', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ID',
            'TYPE',
            'AUTH_RESOLUTION',
            'AUTH_DATE',
            'SERIE',
            //'INIT',
            //'END',
            //'CURRENT',
            //'CREATED_AT',
            //'ACTIVE:boolean',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Fiscal $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'ID' => $model->ID]);
                 }
            ],
        ],
    ]); ?>


</div>
