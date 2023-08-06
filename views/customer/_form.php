<?php

use app\models\Gender;
use app\models\Country;
use yii\bootstrap4\Html;
use yii\helpers\ArrayHelper;
use yii\bootstrap4\ActiveForm;
use kartik\daterange\DateRangePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Customer */
/* @var $form yii\bootstrap4\ActiveForm */
?>

<div class="customer-form">

    <div class="row">
        <div class="col-lg-6">
            <?php $form = ActiveForm::begin(); ?>

            <?= $form->field($model, 'USERNAME')->textInput(['maxlength' => true]) ?>

        </div>
        <div class="col-lg-6">
        <?= $form->field($model, 'FULLNAME')->textInput(['maxlength' => true]) ?>
            <?php // echo $form->field($model, 'PASSWORD')->passwordInput(['maxlength' => true]) ?>

            <?php // echo $form->field($model, 'CREATED_AT')->textInput() 
            ?>

        </div>
    </div>

    

    <div class="row">
        <div class="col-lg-6">
            <?= $form->field($model, 'EMAIL')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-lg-6">
            <?= $form->field($model, 'ID_GENDER')->dropDownList(ArrayHelper::map(Gender::find()->all(), 'ID', 'NAME'), ['prompt' => 'Selecciona el genero',]) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <?= $form->field($model, 'PHONE')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-lg-6">
            <?= $form->field($model, 'WHATSAPP')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <?= $form->field($model, 'ID_COUNTRY')->dropDownList(ArrayHelper::map(Country::find()->all(), 'ID', 'NAME'), ['prompt' => 'Selecciona el pais',]) ?>            
        </div>
        <div class="col-lg-6">
            <?= $form->field($model, 'BIRTHDATE')->widget(
                DateRangePicker::classname(), [
                    'options' => ['placeholder' => 'Select birthday'],
                    'convertFormat' => true,    
                    // 'disabled' => ($this->context->action->id == 'create') ? true : !$model->ONSALE,                
                    'pluginOptions' => [
                        'singleDatePicker'=>true,
                        'showDropdowns'=>true,                        
                        'locale'=>[
                            'format'=>'Y-m-d'
                        ]
                    ]
                ]);
            ?>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <?= $form->field($model, 'TYPE_REGISTRATION')->dropDownList([ 'EMAIL' => 'EMAIL', 'FACEBOOK' => 'FACEBOOK', 'INSTAGRAM' => 'INSTAGRAM', 'GOOGLE' => 'GOOGLE' ], ['prompt' => 'Select an option', 'disabled' => true]) ?>
        </div>
        <div class="col-lg-6">
            <?= $form->field($model, 'ID_REGISTRATION')->textInput(['maxlength' => true,'disabled' => true]) ?>
        </div>
    </div>

    <?= $form->field($model, 'IS_OTP')->checkbox() ?>

    <?= $form->field($model, 'ACTIVE')->checkbox() ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>