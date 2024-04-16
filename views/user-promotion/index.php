<?php

use yii\bootstrap4\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use app\models\UserPromotion;
use yii\helpers\ArrayHelper;
use app\models\User;
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
                'value' => 'customer.EMAIL' 
            ],
            // 'ID_SALE',
            // 'ID_PROMOCION',
            [
                'attribute' => 'promotion',
                'value' => 'promotion.NAME'  
            ],
            // 'ID_USER',
            [
                'attribute' => 'ID_USER',
                'value' => 'user.USERNAME',
                'filter' => Html::activeDropDownList($searchModel, 'ID_USER', ArrayHelper::map(User::find()->asArray()->all(), 'ID', 'USERNAME'),['class'=>'form-control','prompt' => 'Selecciones la línea']),
            ],

            'CREATED_AT:date',
            [

                'class' => ActionColumn::class,
                'template' => '{view}',
                'urlCreator' => function ($action, UserPromotion $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'ID' => $model->ID]);
                 }
            ],
        ],
    ]); ?>


</div>
