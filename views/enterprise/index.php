<?php

use app\models\Enterprise;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
// use yii\grid\GridView;
use kartik\grid\GridView;
use kartik\export\ExportMenu;

/** @var yii\web\View $this */
/** @var app\models\EnterpriseSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Empresas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="enterprise-index">
    <p>
        <?= Html::a('Crear Empresa', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    $gridColumns = [
        ['class' => 'yii\grid\SerialColumn'],

        //'ID',
        'CODE',
        'NAME',
        // 'ADDRESS',
        // 'NIT',
        //'RUT',
        'EMAIL:email',
        'CONTACT',
        'PHONE',
        //'CREATED_AT',
        'ACTIVE:boolean',
        [
            'class' => ActionColumn::className(),
            'urlCreator' => function ($action, Enterprise $model, $key, $index, $column) {
                return Url::toRoute([$action, 'ID' => $model->ID]);
             }
        ],
    ];
    ?>

<?= ExportMenu::widget([
        'dataProvider' => $dataProvider,
        'columns' => $gridColumns,
        'filename' => 'Empresas ' . date("d-M-Y H_i_s"),
        'columnSelectorOptions'=>[
            // 'label' => 'Columnas',
            'class' => 'btn btn-outline-secondary btn-default'
        ],
        'exportConfig' => [
            ExportMenu::FORMAT_HTML => false,
            ExportMenu::FORMAT_TEXT => false,
            ExportMenu::FORMAT_EXCEL => false,
            ExportMenu::FORMAT_PDF => [
                'pdfConfig' => [
                    'methods' => [
                        'SetTitle' => 'Lista de Empresas',
                        'SetSubject' => 'PDF Burger King Colombia',
                        'SetHeader' => ['Lista de Empresas ||Generado en: ' . date("d-M-Y H:i:s")],
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
