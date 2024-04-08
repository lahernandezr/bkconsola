<?php

use yii\bootstrap4\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TypePayment */

$this->title = 'Update Type Payment: ' . $model->NAME;
$this->params['breadcrumbs'][] = ['label' => 'Type Payments', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->NAME, 'url' => ['view', 'ID' => $model->ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="type-payment-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
