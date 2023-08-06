<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TypePayment */
/* @var $form yii\bootstrap4\ActiveForm */
?>

<div class="type-payment-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-4">
            <?= $form->field($model, 'ID')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-8">
            <?= $form->field($model, 'NAME')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

    <?= $form->field($model, 'ACTIVE')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
