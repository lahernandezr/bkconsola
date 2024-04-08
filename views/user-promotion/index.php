<?php

use yii\bootstrap4\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use app\models\UserPromotion;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UserPromotionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'User Promotions';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-promotion-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create User Promotion', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ID',
            'ID_USER',
            'ID_SALE',
            'ID_PROMOCION',
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
