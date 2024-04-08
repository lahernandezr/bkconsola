<?php

use kartik\number\NumberControl;
use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Fiscal */
/* @var $form yii\bootstrap4\ActiveForm */
?>

<div class="fiscal-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'TYPE')->dropDownList([ 'TICKET' => 'TICKET', 'CREDITO FISCAL' => 'CREDITO FISCAL', 'FACTURA' => 'FACTURA' ], ['prompt' => 'Select type fiscal authorization']) ?>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'AUTH_RESOLUTION')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'AUTH_DATE')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <?= $form->field($model, 'SERIE')->textInput(['maxlength' => true]) ?>
        </div>        
        <div class="col-md-3">                
            <?= $form->field($model, 'INIT')->widget(NumberControl::classname(), [
                        'maskedInputOptions' => [
                            'prefix' => '',
                            'suffix' => '',
                            'allowMinus' => false
                        ],
                    ]); ?>            
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'END')->widget(NumberControl::classname(), [
                        'maskedInputOptions' => [
                            'prefix' => '',
                            'suffix' => '',
                            'allowMinus' => false
                        ],
                    ]); ?>              
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'CURRENT')->widget(NumberControl::classname(), [
                        'maskedInputOptions' => [
                            'prefix' => '',
                            'suffix' => '',
                            'allowMinus' => false
                        ],
                    ]); ?>              
        </div>
    </div>
    <?php //$form->field($model, 'CREATED_AT')->textInput() ?>

    <?= $form->field($model, 'ACTIVE')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
