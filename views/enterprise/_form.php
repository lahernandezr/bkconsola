<?php

use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Enterprise $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="enterprise-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'CODE')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'NAME')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    <div class="row">
    <div class="col-md-6">
            <?= $form->field($model, 'EMAIL')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'ADDRESS')->textInput(['maxlength' => true]) ?>
        </div>
        
    </div>
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'NIT')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'RUT')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'CONTACT')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'PHONE')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    <div class="row">
    <div class="col-md-4">
            <?= $form->field($model, 'ACTIVE')->checkbox() ?>
        </div>
        </div>
    <div class="form-group">
        <?= Html::submitButton(($this->context->action->id == 'create') ? 'CREAR' : 'GUARDAR', ['class' => 'btn btn-success']) ?>
    </div>
    

    <?php ActiveForm::end(); ?>

</div>
