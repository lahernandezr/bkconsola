<?php

use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SaleItem */
/* @var $form yii\bootstrap4\ActiveForm */
?>

<div class="sale-item-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ID_SALE')->textInput() ?>

    <?= $form->field($model, 'BARCODE')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'NAME')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ID_CATEGORY')->textInput() ?>

    <?= $form->field($model, 'ID_ITEM')->textInput() ?>

    <?= $form->field($model, 'PRICE_COST')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'PRICE_SELL')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'QUANTITY')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ID_TAX')->textInput() ?>

    <?= $form->field($model, 'TAXES')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'TOTAL')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
