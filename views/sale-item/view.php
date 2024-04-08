<?php

use yii\bootstrap4\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\SaleItem */

$this->title = $model->NAME;
$this->params['breadcrumbs'][] = ['label' => 'Sale Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="sale-item-view">

    <h1><?= Html::encode($this->title) ?></h1>

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
            'ID_SALE',
            'BARCODE',
            'NAME',
            'ID_CATEGORY',
            'ID_ITEM',
            'PRICE_COST',
            'PRICE_SELL',
            'QUANTITY',
            'ID_TAX',
            'TAXES',
            'TOTAL',
        ],
    ]) ?>

</div>
