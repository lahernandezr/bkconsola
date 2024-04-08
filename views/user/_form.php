<?php

use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\daterange\DateRangePicker;
use app\models\Rol;

/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <div class="row">
        <div class="col-lg-12">
            <?php $form = ActiveForm::begin(); ?>



            <div class="row">
                <div class="col-lg-6">
                    <?= $form->field($model, 'USERNAME')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-lg-6">
                    <?= $form->field($model, 'ID_ROL')->dropDownList(ArrayHelper::map(Rol::find()->all(), 'ID', 'NAME'), ['prompt' => 'Select Role',]) ?>
                </div>
            </div>

            <?= $form->field($model, 'FULLNAME')->textInput(['maxlength' => true]) ?>



            <?php // echo  $form->field($model, 'auth_key')->textInput(['maxlength' => true]) 
            ?>

            <?php // echo  $form->field($model, 'password_hash')->textInput(['maxlength' => true]) 
            ?>

            <?php // echo  $form->field($model, 'password_reset_token')->textInput(['maxlength' => true]) 
            ?>

            <div class="row">
                <div class="col-lg-6">
                    <?= $form->field($model, 'EMAIL')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-lg-6">
                    <?= $form->field($model, 'PHONE')->textInput(['maxlength' => true]) ?>
                </div>
            </div>  

            <div class="row">
                <div class="col-lg-6">
                <?= $form->field($model, 'BITHDATE')->widget(
                DateRangePicker::classname(), [
                    'options' => ['placeholder' => 'Select start date'],
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
                <div class="col-lg-6">
                <?= $form->field($model, 'IDENTIFICATION')->textInput(['maxlength' => true]) ?>
                </div>
            </div>

            <?php // echo $form->field($model, 'IS_OTP')->checkbox() ?>

            <?= $form->field($model, 'ACTIVE')->checkbox() ?>

            <?php // echo $form->field($model, 'created_at')->textInput() 
            ?>

            <?php // echo  $form->field($model, 'updated_at')->textInput() 
            ?>

            <?php // echo  $form->field($model, 'verification_token')->textInput(['maxlength' => true]) 
            ?>

            <div class="form-group">
                <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
            </div>

            <?php ActiveForm::end(); ?>

        </div>
    </div>

</div>