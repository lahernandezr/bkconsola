<?php

use yii\bootstrap4\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TypePayment */

$this->title = 'Create Type Payment';
$this->params['breadcrumbs'][] = ['label' => 'Type Payments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="type-payment-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
