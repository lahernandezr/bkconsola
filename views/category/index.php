<?php

use yii\bootstrap4\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use app\models\Category;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Categories';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-index">

    <p>
        <?= Html::a('Create Category', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'rowOptions' => function($model){
            if($model->ACTIVE == 0){
                return ['class' => 'table-danger'];
            }
        },
        'columns' => [
            [
                'class' => 'yii\grid\SerialColumn',
                'headerOptions' => ['style' => 'width:60px;'],
            ],
            // 'ID',
            // 'BACKGROUND',
            // 'FORECOLOR',
            // 'ONSALE:boolean',
            //'INIT',
            //'END',
            [
                'attribute' => 'IMAGE',
                'format' => 'raw',
                'headerOptions' => ['style' => 'width:90px; white-space:normal; word-break:break-word;'],
                'value' => function($model){
                    return Html::img(yii\helpers\Url::to("../uploads/categories/".$model->IMAGE), ['height'=>'70px',]);
                },
            ],
            'NAME',
            [
                'attribute' => 'ID_TAX',
                'value' => 'tax.NAME',
                'headerOptions' => ['style' => 'width:90px; white-space:nowrap; text-overflow:ellipsis; overflow:hidden;'],
            ],
            [
                'attribute' => 'ORDER',
                'headerOptions' => ['style' => 'width:90px; white-space:nowrap; text-overflow:ellipsis; overflow:hidden;'],
                // 'contentOptions' => ['style' => 'width:90px; white-space:nowrap; text-overflow:ellipsis; overflow:hidden;'],
            ],
            [
                'attribute' => 'ACTIVE',
                'format' => 'boolean',
                'headerOptions' => ['style' => 'width:100px; white-space:nowrap; text-overflow:ellipsis; overflow:hidden;'],
                'filterInputOptions' => [
                    'class' => 'form-control',
                    'prompt' => 'All'
                ],
            ],
            [
                'class' => ActionColumn::className(),
                'headerOptions' => ['style' => 'width:90px; white-space:nowrap;text-overflow: ellipsis;overflow:hidden'],
                'urlCreator' => function ($action, Category $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'ID' => $model->ID]);
                 }
            ],
        ],
    ]); ?>

</div>
