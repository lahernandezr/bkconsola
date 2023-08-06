<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SaleItemSearch */
/* @var $form yii\bootstrap4\ActiveForm */
?>

<div class="sale-item-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ID') ?>

    <?= $form->field($model, 'ID_SALE') ?>

    <?= $form->field($model, 'BARCODE') ?>

    <?= $form->field($model, 'NAME') ?>

    <?= $form->field($model, 'ID_CATEGORY') ?>

    <?php // echo $form->field($model, 'ID_ITEM') ?>

    <?php // echo $form->field($model, 'PRICE_COST') ?>

    <?php // echo $form->field($model, 'PRICE_SELL') ?>

    <?php // echo $form->field($model, 'QUANTITY') ?>

    <?php // echo $form->field($model, 'ID_TAX') ?>

    <?php // echo $form->field($model, 'TAXES') ?>

    <?php // echo $form->field($model, 'TOTAL') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
