<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use app\models\Gender;

/* @var $this yii\web\View */
/* @var $searchModel app\models\GenderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Genders';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gender-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Gender', ['create'], ['class' => 'btn btn-success']) ?>
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
                'urlCreator' => function ($action, Gender $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'ID' => $model->ID]);
                 }
            ],
        ],
    ]); ?>


</div>
