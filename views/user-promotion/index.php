<?php

use app\models\User;
use yii\helpers\Url;
use yii\grid\GridView;
use Faker\Guesser\Name;
use yii\bootstrap4\Html;
use yii\grid\ActionColumn;
use yii\helpers\ArrayHelper;
use app\models\UserPromotion;
use kartik\export\ExportMenu;
use kartik\daterange\DateRangePicker;

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

    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    $gridColumns = [
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

        //'CREATED_AT:date',
        [
            'attribute' => 'CREATED_AT',
            'value' => 'CREATED_AT',
            'format' => ['datetime', 'php:d-M-Y'],
            'filter' =>
            DateRangePicker::widget([
                'model' => $searchModel,
                'attribute' => 'created_at_range',
                'convertFormat' => true,
                'presetDropdown' => true,
                'pluginOptions' => [
                    'timePicker' => false,
                    'locale' => [
                        'format' => 'Y-m-d'
                    ],
                    'opens'=>'left'
                ]
            ])
        ],        
        [  
            'class' => ActionColumn::class,
            'template' => '{view}',
            'urlCreator' => function ($action, UserPromotion $model, $key, $index, $column) {
                return Url::toRoute([$action, 'ID' => $model->ID]);
             }
        ],
    ]
    ?>

    <?= ExportMenu::widget([
        'dataProvider' => $dataProvider,
        'columns' => $gridColumns,
        'filename' => 'Clientes ' . date("d-M-Y H_i_s"),
        'columnSelectorOptions'=>[ 'class' => 'btn btn-outline-secondary btn-default' ],
        'exportConfig' => [
            ExportMenu::FORMAT_HTML => false,
            ExportMenu::FORMAT_TEXT => false,
            ExportMenu::FORMAT_EXCEL => false,
            ExportMenu::FORMAT_PDF => [
                'pdfConfig' => [
                    'methods' => [
                        'SetTitle' => 'Cupones Inactivos',
                        'SetSubject' => 'Burger King Colombia',
                        'SetHeader' => ['Cupones Inactivos ||Generado en: ' . date("r")],
                        'SetFooter' => ['|Pagina {PAGENO}|'],
                        'SetAuthor' => 'Burger King Colombia',
                        'SetCreator' => 'Burger King Colombia',
                        'SetKeywords' => 'Burger, King, Colombia, PDF',
                    ],
                ],   
            ],
        ],
        'dropdownOptions' => [
            'label' => 'Exportar',
            'class' => 'btn btn-outline-secondary btn-default'
        ],
    ]) . "<hr>\n"; ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => $gridColumns,
    ]); ?>


</div>
