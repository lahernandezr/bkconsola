<?php

use yii\bootstrap4\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Promotion */

$this->title = $model->NAME . ' ' . $model->CODE;
$this->params['breadcrumbs'][] = ['label' => 'Cupones', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="promotion-view">

    <p>
        <?= Html::a('Actualizar', ['update', 'ID' => $model->ID], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Dar de Baja', ['delete', 'ID' => $model->ID], [
            'class' => 'btn btn-primary',
            'data' => [
                'confirm' => '¿Estas seguro de dar de baja el registro?',
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
            'CODE',
            'NAME',
            'DESCRIPTION',
            'ID_TYPE_PROMOTION',
            [
                'attribute' => 'ID_TYPE_PROMOTION',
                'value' => $model->typePromotion->NAME  
            ],             
            // 'VALUE',
            // 'TYPE_DISC',
            // 'ID_ITEM',
            'INIT:date',
            'END:date',
            // 'IMAGE:ntext',
            'LINK:url',
            'LIMIT_EXCHANGE',
            'REDIMM',
            'ACTIVE:boolean',
        ],
    ]) ?>
    </div>
        <div class="col-md-4">
        <?= Html::img('@web/uploads/promos/' . $model->IMAGE, ['alt'=>'some', 'class'=>'thing', 'style'=>'width:300px']);?>
        </div>
    </div>

</div>
