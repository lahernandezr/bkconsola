<?php

use yii\bootstrap4\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
 
/* @var $this yii\web\View */
/* @var $model app\models\Item */

$this->title = $model->NAME . '- id: ' . $model->ID;
$this->params['breadcrumbs'][] = ['label' => 'Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="item-view">

    <p>
        <?php if($model->ID == $model->ID_PARENT): ?>
            <?= Html::a('Update', ['update', 'ID' => $model->ID], ['class' => 'btn btn-primary']) ?>
        <?php else: ?>
            <?= Html::a('Update', ['update', 'ID' => $model->ID_PARENT], ['class' => 'btn btn-primary']) ?>
        <?php endif; ?>
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
            // [
            //     'attribute' => 'IMAGE',
            //     'format' => 'raw',
            //     'value' => function($model){
            //         return Html::img(Url::to("../uploads/items/".$model->IMAGE), ['height'=>'100px',]);
            //     },
            // ],
            // 'ID',
            'BARCODE',
            'NAME',
            'DESCRIPCION:ntext',
            
            'ID_CATEGORY',
            'PRICE_COST:currency',
            'PRICE_SELL:currency',
            // 'IMAGE:ntext',
            [
                'attribute' => 'ID_TAX',
                'value' => $model->tax ? $model->tax->NAME : '-',
            ],
            'MARGIN',
            'PRICE_TAX:currency',
            'ON_SALE:boolean',
            'INIT',
            'END',
            'IS_SHOW:boolean',
            'ACTIVE:boolean',
        ],
    ]) ?>
        </div>
        <div class="col-md-4">
        <?= Html::img('@web/uploads/items/' . $model->IMAGE, ['alt'=>'some', 'class'=>'thing', 'style'=>'width:300px']);?>
        </div>
    </div>

    

</div>
