<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Promotion */

$this->title = $model->NAME . ' - id: ' . $model->ID;
$this->params['breadcrumbs'][] = ['label' => 'Promotions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="promotion-view">

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
            'CODE',
            'NAME',
            'DESCRIPTION',
            'ID_TYPE_PROMOTION',
            'VALUE',
            'TYPE_DISC',
            'ID_ITEM',
            'INIT',
            'END',
            // 'IMAGE:ntext',
            'LINK:ntext',
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
