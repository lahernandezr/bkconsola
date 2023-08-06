<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Tax */
/* @var $form yii\bootstrap4\ActiveForm */
?>

<div class="tax-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'NAME')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'PERCENT')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ACTIVE')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
