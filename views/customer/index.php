<?php

use app\models\Customer;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CustomerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Clientes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="customer-index">

    <p>
        <?= Html::a('Crear Cliente', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'ID',
            'USERNAME',
            //'PASSWORD',
            'FULLNAME',
            'EMAIL:email',
            //'PHONE',
            //'WHATSAPP',
            [
                'format' => 'raw',
                'attribute' => 'WHATSAPP',
                'value' => 'whatsAppLink'
            ],
            //'COUNTRY',
            //'BIRTHDATE',
            //'ID_GENDER',
            'TYPE_REGISTRATION',
            //'ID_REGISTRATION',
            'CREATED_AT',
            //'IS_OTP:boolean',
            //'ACTIVE:boolean',
            [
                'class' => ActionColumn::class,
                'urlCreator' => function ($action, Customer $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'ID' => $model->ID]);
                 }
            ],
        ],
    ]); ?>


</div>
