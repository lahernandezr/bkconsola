<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SalePayment */

$this->title = 'Update Sale Payment: ' . $model->ID;
$this->params['breadcrumbs'][] = ['label' => 'Sale Payments', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID, 'url' => ['view', 'ID' => $model->ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="sale-payment-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
