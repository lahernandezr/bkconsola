<?php

use app\models\Customer;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
// use yii\grid\GridView;
use kartik\export\ExportMenu;
use kartik\grid\GridView;

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

    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    $gridColumns = [

        // ['class' => 'yii\grid\SerialColumn'],
        ['class' => 'kartik\grid\SerialColumn'],

        //'ID',
        'USERNAME',
        //'PASSWORD',
        'FULLNAME',
        'EMAIL:email',
        'PHONE',
        //'WHATSAPP',
        // [
        //     'format' => 'raw',
        //     'attribute' => 'WHATSAPP',
        //     'value' => 'whatsAppLink'
        // ],
        //'COUNTRY',
        //'BIRTHDATE',
        //'ID_GENDER',
        'TYPE_REGISTRATION',
        //'ID_REGISTRATION',
        // 'CREATED_AT',
        [
            'attribute' => 'CREATED_AT',
            'format' => ['datetime', 'php:d-M-Y']
            ],
        //'IS_OTP:boolean',
        'ACTIVE:boolean',
        [
            'class' => ActionColumn::class,
            'urlCreator' => function ($action, Customer $model, $key, $index, $column) {
                return Url::toRoute([$action, 'ID' => $model->ID]);
             }
        ],
    ];
    
    ?>


    <?php echo ExportMenu::widget([
    'dataProvider' => $dataProvider,
    'columns' => $gridColumns,
    'dropdownOptions' => [
        'label' => 'Export All',
        'class' => 'btn btn-outline-secondary btn-default'
    ]
]) . "<hr>\n"; ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => $gridColumns,
    ]); ?>


</div>
