<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SaleSearch */
/* @var $form yii\bootstrap4\ActiveForm */
?>

<div class="sale-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ID') ?>

    <?= $form->field($model, 'ID_USER') ?>

    <?= $form->field($model, 'ID_ADDRESS') ?>

    <?= $form->field($model, 'SUBTOTAL') ?>

    <?= $form->field($model, 'TAXES') ?>

    <?php // echo $form->field($model, 'TOTAL') ?>

    <?php // echo $form->field($model, 'TENDER') ?>

    <?php // echo $form->field($model, 'PAYMENTS') ?>

    <?php // echo $form->field($model, 'CHANGED') ?>

    <?php // echo $form->field($model, 'NOTES') ?>

    <?php // echo $form->field($model, 'CREATED_AT') ?>

    <?php // echo $form->field($model, 'ACTIVE')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
