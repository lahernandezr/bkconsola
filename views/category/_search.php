<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CategorySearch */
/* @var $form yii\bootstrap4\ActiveForm */
?>

<div class="category-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ID') ?>

    <?= $form->field($model, 'NAME') ?>

    <?= $form->field($model, 'ID_TAX') ?>

    <?= $form->field($model, 'BACKGROUND') ?>

    <?= $form->field($model, 'FORECOLOR') ?>

    <?php // echo $form->field($model, 'IMAGE') ?>

    <?php // echo $form->field($model, 'ORDER') ?>

    <?php // echo $form->field($model, 'ONSALE')->checkbox() ?>

    <?php // echo $form->field($model, 'INIT') ?>

    <?php // echo $form->field($model, 'END') ?>

    <?php // echo $form->field($model, 'ACTIVE')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
