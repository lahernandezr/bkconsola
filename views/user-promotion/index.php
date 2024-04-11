<?php

use yii\bootstrap4\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use app\models\UserPromotion;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UserPromotionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Redencion de Cupones';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-promotion-index">


    <p>
        <?= Html::a('Redimir', ['redeem'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ID',
            'ID_CUSTOMER',
            // 'ID_SALE',
            'ID_PROMOCION',
            'ID_USER',
            'CREATED_AT',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, UserPromotion $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'ID' => $model->ID]);
                 }
            ],
        ],
    ]); ?>


</div>
