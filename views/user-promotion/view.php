<?php

use yii\bootstrap4\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\UserPromotion */

$this->title = $model->promotion->CODE;
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
            [
                'attribute' => 'ID_USER',
                'value' => $model->user->FULLNAME  
            ],
            'ID_SALE',
            // 'ID_PROMOCION',
            [
                'attribute' => 'ID_PROMOCION',
                'value' => $model->promotion->CODE  
            ],
            'CREATED_AT',
        ],
    ]) ?>

</div>
