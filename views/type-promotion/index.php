<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use app\models\TypePromotion;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TypePromotionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Type Promotions';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="type-promotion-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Type Promotion', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ID',
            'NAME',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, TypePromotion $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'ID' => $model->ID]);
                 }
            ],
        ],
    ]); ?>


</div>
