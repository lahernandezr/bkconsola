<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CustomerSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="customer-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ID') ?>

    <?= $form->field($model, 'USERNAME') ?>

    <?= $form->field($model, 'PASSWORD') ?>

    <?= $form->field($model, 'EMAIL') ?>

    <?= $form->field($model, 'FULLNAME') ?>

    <?php // echo $form->field($model, 'PHONE') ?>

    <?php // echo $form->field($model, 'WHATSAPP') ?>

    <?php // echo $form->field($model, 'COUNTRY') ?>

    <?php // echo $form->field($model, 'BIRTHDATE') ?>

    <?php // echo $form->field($model, 'ID_GENDER') ?>

    <?php // echo $form->field($model, 'TYPE_REGISTRATION') ?>

    <?php // echo $form->field($model, 'ID_REGISTRATION') ?>

    <?php // echo $form->field($model, 'CREATED_AT') ?>

    <?php // echo $form->field($model, 'IS_OTP')->checkbox() ?>

    <?php // echo $form->field($model, 'ACTIVE')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
