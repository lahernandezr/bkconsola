<?php

use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\UserPromotion */
/* @var $form yii\bootstrap4\ActiveForm */
?>

<div class="qr-promotion-form">

    <p>Escanea el codigo QR que presenta el cliente.</p>
    <?php $form = ActiveForm::begin([
        'id' => 'qr-form',
        'method' => 'post',
        'action' => ['user-promotion/redeem-complete'],
        ]); ?>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'qrcode') ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Redimir', [
            'class' => 'btn btn-primary'
            ]) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>