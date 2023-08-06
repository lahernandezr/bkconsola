<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SalePaymentSearch */
/* @var $form yii\bootstrap4\ActiveForm */
?>

<div class="sale-payment-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ID') ?>

    <?= $form->field($model, 'ID_SALE') ?>

    <?= $form->field($model, 'TYPE_PAYMENT') ?>

    <?= $form->field($model, 'NUMBER') ?>

    <?= $form->field($model, 'AMOUNT') ?>

    <?php // echo $form->field($model, 'TOTAL') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
