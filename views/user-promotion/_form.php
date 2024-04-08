<?php

use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\UserPromotion */
/* @var $form yii\bootstrap4\ActiveForm */
?>

<div class="user-promotion-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ID_USER')->textInput() ?>

    <?= $form->field($model, 'ID_SALE')->textInput() ?>

    <?= $form->field($model, 'ID_PROMOCION')->textInput() ?>

    <?= $form->field($model, 'CREATED_AT')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
