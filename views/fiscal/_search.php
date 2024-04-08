<?php

use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\FiscalSearch */
/* @var $form yii\bootstrap4\ActiveForm */
?>

<div class="fiscal-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ID') ?>

    <?= $form->field($model, 'TYPE') ?>

    <?= $form->field($model, 'AUTH_RESOLUTION') ?>

    <?= $form->field($model, 'AUTH_DATE') ?>

    <?= $form->field($model, 'SERIE') ?>

    <?php // echo $form->field($model, 'INIT') ?>

    <?php // echo $form->field($model, 'END') ?>

    <?php // echo $form->field($model, 'CURRENT') ?>

    <?php // echo $form->field($model, 'CREATED_AT') ?>

    <?php // echo $form->field($model, 'ACTIVE')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
