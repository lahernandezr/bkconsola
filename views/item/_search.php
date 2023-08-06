<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ItemSearch */
/* @var $form yii\bootstrap4\ActiveForm */
?>

<div class="item-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ID') ?>

    <?= $form->field($model, 'NAME') ?>

    <?= $form->field($model, 'DESCRIPCION') ?>

    <?= $form->field($model, 'BARCODE') ?>

    <?= $form->field($model, 'ID_CATEGORY') ?>

    <?php // echo $form->field($model, 'PRICE_COST') ?>

    <?php // echo $form->field($model, 'PRICE_SELL') ?>

    <?php // echo $form->field($model, 'IMAGE') ?>

    <?php // echo $form->field($model, 'ID_TAX') ?>

    <?php // echo $form->field($model, 'ON_SALE')->checkbox() ?>

    <?php // echo $form->field($model, 'INIT') ?>

    <?php // echo $form->field($model, 'END') ?>

    <?php // echo $form->field($model, 'ACTIVE')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
