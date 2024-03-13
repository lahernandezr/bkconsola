<?php

use app\models\Item;
use app\models\TypePromotion;
use app\models\GeneratorCode;
use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\daterange\DateRangePicker;
use kartik\number\NumberControl;
use kartik\file\FileInput;
use kartik\select2\Select2;
use yii\web\JsExpression;
use yii\web\View;
use kartik\datetime\DateTimePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Promotion */
/* @var $form yii\bootstrap4\ActiveForm */

$url = \yii\helpers\Url::to(['item-list']);


$dataList = Item::find()->andWhere(['ID' => $model->ID_ITEM])->all();
$data = ArrayHelper::map($dataList, 'ID', 'NAME');

$gcode = new GeneratorCode();
$code = $gcode->generate_string("PBCL",date('YHmids'),10);
if($this->context->action->id == 'update' ) 
    $code = $model->CODE;
?>

<div class="promotion-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-8">

            <div class="row">
                <div class="col-md-4">
                    <?= $form->field($model, 'CODE')->textInput(['maxlength' => true, 'value' => $code, 'readonly' => true ]) ?>
                </div>
                
            </div>

            <div class="row">
            <div class="col-md-12">
                    <?= $form->field($model, 'NAME')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-md-12">
                <?= $form->field($model, 'DESCRIPTION')->textInput(['maxlength' => true]) ?>
                </div>
            
                
            </div>

            

            <div class="row">
                <div class="col-md-4">
                    <?= $form->field($model, 'ID_TYPE_PROMOTION')->dropDownList(
                        ArrayHelper::map(TypePromotion::find()->all(), 'ID', 'NAME'),
                        [
                            'prompt' => 'Selección Tipo Promoción',
                            'onChange' => '                            
                            if($(this).val() == ""){
                                $("#promotion-type_disc").prop("disabled",true);
                                $("#promotion-value-disp").prop("disabled",true);
                                $("#promotion-id_item").prop("disabled",true);
                            }
                            else if($(this).val() == "PC"){
                                $("#promotion-type_disc").prop("disabled",true);
                                $("#promotion-value-disp").prop("disabled",true);
                                $("#promotion-id_item").prop("disabled",false);
                            }                            
                            else if($(this).val() == "PI"){
                                $("#promotion-type_disc").prop("disabled",true);
                                $("#promotion-value-disp").prop("disabled",true);
                                $("#promotion-id_item").prop("disabled",true);
                            }                            
                            else if($(this).val() == "PS"){
                                $("#promotion-type_disc").prop("disabled",false);
                                $("#promotion-value-disp").prop("disabled",false);
                                $("#promotion-id_item").prop("disabled",true);
                            }     
                            else if($(this).val() == "PT"){
                                $("#promotion-type_disc").prop("disabled",false);
                                $("#promotion-value-disp").prop("disabled",false);
                                $("#promotion-id_item").prop("disabled",false);
                            }'                             
                        ]
                    )
                    ?>
                </div>
                <div class="col-md-4">
                    <?= $form->field($model, 'TYPE_DISC')->dropDownList(
                        ['PERCENT' => 'PERCENT', 'AMOUNT' => 'AMOUNT'], [
                            'prompt' => 'Select Type Discount',
                                                      
                            ]) ?>
                </div>
                <div class="col-md-4">
                    <?=
                    $form->field($model, 'VALUE')->widget(NumberControl::class, [
                        'maskedInputOptions' => [
                            'prefix' => '',
                            'suffix' => '',
                            'allowMinus' => false
                        ],
                    ]); ?>
                </div>
            </div>

            <?= $form->field($model, 'ID_ITEM')->widget(Select2::class, [
                'data' => $data,
                'options' => ['multiple'=>false, 'placeholder' => 'Search for a item ...'],
                'pluginOptions' => [
                    'allowClear' => true,
                    'minimumInputLength' => 3,
                    'language' => [
                        'errorLoading' => new JsExpression("function () { return 'Waiting for results...'; }"),
                    ],
                    'ajax' => [
                        'url' => $url,
                        'dataType' => 'json',
                        'data' => new JsExpression('function(params) { return {q:params.term}; }')
                    ],
                    'escapeMarkup' => new JsExpression('function (markup) { return markup; }'),
                    'templateResult' => new JsExpression('function (product) { return product.text; }'),
                    'templateSelection' => new JsExpression('function (product) { return product.text; }'),
                ],
            ]); ?>            

            <div class="row">
                <div class="col-md-6">
                    <?php //$form->field($model, 'INIT')->textInput() 
                    ?>

                    <?= $form->field($model, 'INIT')->widget(
                            DateTimePicker::class,
                            [
                                'options' => ['placeholder' => 'Selecciona Fecha Inicio'],
                                'convertFormat' => true,                               
                                'pluginOptions' => [
                                    'autoclose' => true,                                    
                                    'todayHighlight' => true,
                                    'format' => 'yyyy-MM-dd'
                                ]
                            ]
                        ) ?>                    
                </div>
                <div class="col-md-6">
                    <?php //$form->field($model, 'END')->textInput() 
                    ?>
                    <?= $form->field($model, 'END')->widget(
                            DateTimePicker::class,
                            [
                                'options' => ['placeholder' => 'Selecciona Fecha Termino'],
                                'convertFormat' => true,                               
                                'pluginOptions' => [
                                    'autoclose' => true,                                    
                                    'todayHighlight' => true,
                                    'format' => 'yyyy-MM-dd'
                                ]
                            ]
                        ) ?>                     
                   </div>
            </div>

            <?= $form->field($model, 'LINK')->textInput(['maxlength' => false]) ?>
            <div class="row">
                <div class="col-md-6">                    
                    <?= $form->field($model, 'LIMIT_EXCHANGE')->widget(NumberControl::class, [
                                'maskedInputOptions' => [
                                    'prefix' => '',
                                    'min' => 0,
                                    'max' => 999999,
                                    'allowMinus' => false
                                ],

                            ]); ?>                    
                </div>
                <div class="col-md-6">                    
                    <?= $form->field($model, 'LIMIT_PER_CUSTOMER')->widget(NumberControl::class, [
                                'maskedInputOptions' => [
                                    'prefix' => '',
                                    'min' => 0,
                                    'max' => 999999,
                                    'allowMinus' => false
                                ],

                            ]); ?>                    
                </div>
                <div class="col-md-6">
                    <?= $form->field($model, 'LIMIT_PER_DAY')->widget(NumberControl::class, [
                                'maskedInputOptions' => [
                                    'prefix' => '',
                                    'min' => 0,
                                    'max' => 999999,
                                    'allowMinus' => false
                                ],

                            ]); ?>                      
                </div>
                
                <div class="col-md-6">
                    
                    <?= $form->field($model, 'LIMIT_PER_DAY_CUSTOMER')->widget(NumberControl::class, [
                                'maskedInputOptions' => [
                                    'prefix' => '',
                                    'min' => 0,
                                    'max' => 999999,
                                    'allowMinus' => false
                                ],

                            ]); ?>                    
                </div>                
            </div>
          
            <div class="row">
                <div class="col-md-6">
                    <?= $form->field($model, 'REDIMM')->textInput(['readonly' => true]) ?>
                </div>
                <div class="col-md-6">
                    
                </div>
            </div>                        
            <?= $form->field($model, 'ACTIVE')->checkbox(['checked' => ($this->context->action->id == 'create') ? true : $model->ACTIVE]) ?>


            <div class="form-group">
                <?= Html::submitButton('GUARDAR', ['class' => 'btn btn-success']) ?>
            </div>

        </div>

        <div class="col-md-4">
            <div class="row">
                <div class="col-md-12">            
                    <?php if ($this->context->action->id == 'create') : ?>
                        <?= $form->field($model, 'file')->widget(FileInput::class, [
                            'options' => [
                                'accept' => 'image/*'
                            ],
                            'pluginOptions' => [
                                'showUpload' => false
                            ],
                        ]);
                        ?>
                    <?php endif; ?>
                    <?php if ($this->context->action->id == 'update') : ?>
                        <?= $form->field($model, 'file')->widget(FileInput::class, [
                            'options' => [
                                'accept' => 'image/*'
                            ],
                            'pluginOptions' => [
                                'showUpload' => false,
                                'initialPreview'=>[
                                    Yii::$app->getHomeUrl() . 'uploads/promos/' . $model->IMAGE
                                ],
                                'initialPreviewAsData'=>true,
                            ],
                        ]);
                        ?>
                    <?php endif; ?>
                </div>
                <div class="col-md-12">
                    <?= $form->field($model, 'SERIE')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-md-12">    
                    <?= $form->field($model, 'S_INIT')->widget(NumberControl::class, [
                                'maskedInputOptions' => [
                                    'prefix' => '',
                                    'min' => 0,
                                    'max' => 999999,
                                    'allowMinus' => false
                                ],

                            ]); ?>              
                </div>
                <div class="col-md-12">    
                    <?= $form->field($model, 'S_END')->widget(NumberControl::class, [
                                'maskedInputOptions' => [
                                    'prefix' => '',
                                    'min' => 0,
                                    'max' => 999999,
                                    'allowMinus' => false
                                ],

                            ]); ?>              
                </div>                
            </div>
        </div>

    <?php ActiveForm::end(); ?>

</div>

<?php 
$this->registerJs("
    $(document).ready( function () {
        setTimeout(function() { 
            $('#promotion-type_disc').prop('disabled',true);
            $('#promotion-value-disp').prop('disabled',true);
            $('#promotion-id_item').prop('disabled',true);
        }, 1000);
    });    
", View::POS_END, "inicializador");