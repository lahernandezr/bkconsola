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
            <img src="<?= Yii::$app->getHomeUrl(); ?>/images/qr.png" height="128"/>
            <img src="<?= Yii::$app->getHomeUrl(); ?>/images/scanner.png" height="128"/>
        </div>
        <div class="col-md-3">
           
        </div>    
    </div>
    <div class="row">        
        <div class="col-md-6">
            <?= $form->field($model, 'qrcode')->passwordInput(['maxlength' => true]); ?>
        </div>
    </div>
    <div class="row pt-2">
        <div class="col-md-12">
            <div class="form-group">
                <?= Html::button('Validar Codigo', ['class' => 'btn btn-primary', 'onclick' => '
                                    if($("#promoredeem-qrcode").val()=="")
                                        return;
                                    //alert($("#promoredeem-qrcode").val());
                                    $.get("redeem-validator?ID="+$("#promoredeem-qrcode").val(), function(data) {        
                                        console.log(data);
                                        result = JSON.parse(data);
                                        $(document).Toasts("create", {
                                            class: result.result=="ERROR" ?"bg-red":"bg-green",
                                            title: "Resultado",
                                            subtitle: "Console",
                                            body: result.message,
                                            autohide:true,
                                            delay:3000
                                          })
                                });']) ?>        
                <?= Html::submitButton('Redimir Código', ['class' => 'btn btn-success']) ?>
                <?= Html::submitButton('Reportar Problema', ['class' => 'btn btn-danger']) ?>
            </div>
        </div>
    </div>
    <?php ActiveForm::end(); ?>

</div>