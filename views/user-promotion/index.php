<?php

use yii\bootstrap4\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use app\models\UserPromotion;
use Faker\Guesser\Name;

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
            // 'ID_CUSTOMER',
            [
                'attribute' => 'customer',
                'value' => 'user.EMAIL' 
            ],
            // 'ID_SALE',
            // 'ID_PROMOCION',
            [
                'attribute' => 'promotion',
                'value' => 'promotion.CODE'  
            ],
            // 'ID_USER',
            [
                'attribute' => 'user',
                'value' => 'user.USERNAME' 
            ],
            'CREATED_AT:date',
            [
                'class' => ActionColumn::class,
                'urlCreator' => function ($action, UserPromotion $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'ID' => $model->ID]);
                 }
            ],
        ],
    ]); ?>


</div>
