<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\TypePayment */

$this->title = $model->NAME;
$this->params['breadcrumbs'][] = ['label' => 'Type Payments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="type-payment-view">

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

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ID',
            'NAME',
            'ACTIVE:boolean',
        ],
    ]) ?>

</div>
