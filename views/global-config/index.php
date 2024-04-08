<?php

use yii\bootstrap4\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use app\models\GlobalConfig;

/* @var $this yii\web\View */
/* @var $searchModel app\models\GlobalConfigSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Configuración Global';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="global-config-index">

    <p>
        <?= Html::a('Crear Configuración Global', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ID',
            'VALUE',
            'DESCRIPTION',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, GlobalConfig $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'ID' => $model->ID]);
                 }
            ],
        ],
    ]); ?>


</div>
