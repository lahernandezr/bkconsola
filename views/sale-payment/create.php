<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SalePayment */

$this->title = 'Create Sale Payment';
$this->params['breadcrumbs'][] = ['label' => 'Sale Payments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sale-payment-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
