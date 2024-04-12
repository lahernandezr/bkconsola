<?php

use yii\bootstrap4\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\UserPromotion */

$this->title = $model->promotion->ID;
$this->params['breadcrumbs'][] = ['label' => 'Redencion', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="user-promotion-view">

    <h1><?php // Html::encode($this->title) ?></h1>

    <p>
        <?php // Html::a('Update', ['update', 'ID' => $model->ID], ['class' => 'btn btn-success']) ?>
        <?php // Html::a('ELIMINAR', ['delete', 'ID' => $model->ID], [
            // 'class' => 'btn btn-primary',
            // 'data' => [
            //     'confirm' => 'Are you sure you want to delete this item?',
            //     'method' => 'post',
            // ],
        //]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ID',
            // 'ID_USER',
            
            // 'ID_SALE',
            // 'ID_PROMOCION',
            [
                'attribute' => 'customer',
                'value' => $model->customer->FULLNAME  
            ],
            [
                'attribute' => 'ID_PROMOCION',
                'value' => $model->promotion->CODE  
            ],
            [
                'attribute' => 'promotion',
                'format' => 'raw',
                'label' => 'Imagen de Cupón',
                'value' => Html::img('@web/uploads/promos/' . $model->promotion->IMAGE, ['alt'=>'some', 'class'=>'thing', 'style'=>'width:300px'])
            ],
            [
                'attribute' => 'promotion',
                'format' => 'raw',
                'label' => 'Descripción de Cupón',
                'value' => $model->promotion->DESCRIPTION
            ],
            [
                'attribute' => 'ID_USER',
                'label' => 'Redimido por',
                'value' => $model->user->USERNAME  
            ],
            'CREATED_AT:datetime',
        ],
        'template' => "<tr><th style='width: 30%;'>{label}</th><td>{value}</td></tr>"
    ]) ?>

</div>
