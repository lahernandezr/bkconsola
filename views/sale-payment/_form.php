<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SalePayment */
/* @var $form yii\bootstrap4\ActiveForm */
?>

<div class="sale-payment-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ID_SALE')->textInput() ?>

    <?= $form->field($model, 'TYPE_PAYMENT')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'NUMBER')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'AMOUNT')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'TOTAL')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
