<?php

use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\UserPromotion */
/* @var $form yii\bootstrap4\ActiveForm */
?>

<div class="user-promotion-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ID_USER')->hiddenInput(['value' => $model->ID_USER])->label(false); ?>

    <?php $form->field($model, 'ID_SALE')->hiddenInput(['value' => $model->ID_SALE])->label(false); ?>

    <?= $form->field($model, 'ID_PROMOCION')->textInput() ?>

    <?= $form->field($model, 'CREATED_AT')->hiddenInput(['value' => $model->CREATED_AT])->label(false); ?>

    <div class="form-group">
        <?= Html::submitButton(($this->context->action->id == 'create') ? 'Canjear' : 'GUARDAR CAMBIOS', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
