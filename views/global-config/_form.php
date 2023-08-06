<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\GlobalConfig */
/* @var $form yii\bootstrap4\ActiveForm */
?>

<div class="global-config-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ID')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'VALUE')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'DESCRIPTION')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
