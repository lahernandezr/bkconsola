<?php

use app\models\Enterprise;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\EnterpriseSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Empresa';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="enterprise-index">



    <p>
        <?= Html::a('Crear Empresa', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'ID',
            'CODE',
            'NAME',
            'ADDRESS',
            'NIT',
            //'RUT',
            //'EMAIL:email',
            //'CONTACT',
            //'PHONE',
            //'CREATED_AT',
            //'ACTIVE',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Enterprise $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'ID' => $model->ID]);
                 }
            ],
        ],
    ]); ?>


</div>
