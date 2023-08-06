<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TypeItem */
/* @var $form yii\bootstrap4\ActiveForm */
?>

<div class="type-item-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ID')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'NAME')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
