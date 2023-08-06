<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use kartik\color\ColorInput;
use kartik\file\FileInput;
use kartik\daterange\DateRangePicker;
use yii\helpers\ArrayHelper;
use app\models\Tax;
use yii\web\View;

/* @var $this yii\web\View */
/* @var $model app\models\Category */
/* @var $form yii\bootstrap4\ActiveForm */
?>

<div class="category-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-md-8">

            <?= $form->field($model, 'NAME')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'ID_TAX')->dropDownList(ArrayHelper::map(Tax::find()->all(), 'ID', 'NAME'), ['prompt' => 'Select Category Tax',]) ?>

            <?= $form->field($model, 'ORDER')->textInput() ?>

            <?= $form->field($model, 'ONSALE')->checkbox([
                'onclick'=>'if(this.checked){
                        console.log("CHECKBOX CLICKED");
                        $("#category-init").prop("disabled", false);
                        $("#category-end").prop("disabled", false);
                    } else {
                        console.log("NO CHECKBOX CLICKED");
                        $("#category-init").prop("disabled", true);
                        $("#category-end").prop("disabled", true);
                    }'
                ]) ?>

            <div class="row">
                <div class="col-md-6">
                <?= $form->field($model, 'INIT')->widget(
                DateRangePicker::classname(), [
                    'options' => ['placeholder' => 'Select start date'],
                    'convertFormat' => true,    
                    'disabled' => ($this->context->action->id == 'create') ? true : !$model->ONSALE,                
                    'pluginOptions' => [
                        'singleDatePicker'=>true,
                        'timePicker'=>true,
                        'timePickerIncrement'=>30,                        
                        'locale'=>[
                            'format'=>'Y-m-d H:i:s'
                        ]
                    ]
                ]);
            ?>
        </div>
        <div class="col-md-6">
                <?= $form->field($model, 'END')->widget(
                DateRangePicker::classname(), [
                    'options' => ['placeholder' => 'Select end date'],
                    'convertFormat' => true,
                    'disabled' => ($this->context->action->id == 'create') ? true : !$model->ONSALE,          
                    'pluginOptions' => [
                        'singleDatePicker'=>true,
                        'timePicker'=>true,
                        'timePickerIncrement'=>30,
                        'locale'=>[
                            'format'=>'Y-m-d H:i:s'
                        ]
                    ]
                ]);
            ?>
            </div>
        </div>
        <?= $form->field($model, 'IS_SHOW')->checkbox() ?>
        <?= $form->field($model, 'ACTIVE')->checkbox(['checked' => ($this->context->action->id == 'create') ? true : $model->ACTIVE]) ?>

             

            <div class="form-group">
                <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
            </div>

        </div>

        <div class="col-md-4">

        <?php if($this->context->action->id == 'update') : ?>
            <?= $form->field($model, 'file')->widget(FileInput::classname(), [
                'options' => [
                    'accept' => 'image/*'
                ],
                'pluginOptions' => [
                    'showUpload' => false,
                    'initialPreview'=>[
                        Yii::$app->getHomeUrl() . 'uploads/categories/' . $model->IMAGE
                    ],
                    'initialPreviewAsData'=>true,
                ],
            ]);
            ?>
        <?php endif;?>

        <?php if($this->context->action->id == 'create') :?>
            <?= $form->field($model, 'file')->widget(FileInput::classname(), [
                'options' => [
                    'accept' => 'image/*'
                ],
                'pluginOptions' => [
                    'showUpload' => false,
                ],
            ]);
            ?>
        <?php endif;?>

        <?= $form->field($model, 'BACKGROUND')->widget(ColorInput::classname(), ['options' => ['placeholder' => 'Select color ...'],]) ?>
        
        <?= $form->field($model, 'FORECOLOR')->widget(ColorInput::classname(), ['options' => ['placeholder' => 'Select color ...'],]) ?>
                
            
        </div>
    </div>  

    <?php ActiveForm::end(); ?>

</div>

