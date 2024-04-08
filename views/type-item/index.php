<?php

use yii\bootstrap4\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use app\models\TypeItem;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TypeItemSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Type Items';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="type-item-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Type Item', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ID',
            'NAME',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, TypeItem $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'ID' => $model->ID]);
                 }
            ],
        ],
    ]); ?>


</div>
