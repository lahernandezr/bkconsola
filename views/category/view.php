<?php

use yii\bootstrap4\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Category */

$this->title = $model->NAME . " - Id: "  . $model->ID;
$this->params['breadcrumbs'][] = ['label' => 'Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="category-view">

    <p>
        <?= Html::a('Update', ['update', 'ID' => $model->ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'ID' => $model->ID], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <div class="row">
        <div class="col-md-8">
        <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // 'ID',
            // 'IMAGE:ntext',
            // [
            //     'attribute' => 'IMAGE',
            //     'format' => 'raw',
            //     'value' => function($model){
            //         return Html::img(Url::to("../uploads/categories/".$model->IMAGE), ['height'=>'100px',]);
            //     },
            // ],
            'NAME',
            [
                'attribute' => 'BACKGROUND',
                'value' => $model->showBackgroundColor,
                'format' => 'html',
            ],
            [
                'attribute' => 'FORECOLOR',
                'value' => $model->showForecolor,
                'format' => 'html',
            ],
            [
                'attribute' => 'ID_TAX',
                'value' => $model->tax ? $model->tax->NAME : '-',
            ],
            'ORDER',
            'ONSALE:boolean',
            'INIT',
            'END',
            'IS_SHOW:boolean',
            'ACTIVE:boolean',
        ],
    ]) ?>
        </div>
        <div class="col-md-4">
        <?= Html::img('@web/uploads/categories/' . $model->IMAGE, ['alt'=>'some', 'class'=>'thing', 'style'=>'width:300px']);?>
        </div>
    </div>
    

</div>
