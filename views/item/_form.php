<?php

use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\web\View;
use app\models\Tax;
use app\models\Category;
use app\models\ItemModifier;
use app\models\TypeItem;
use kartik\file\FileInput;
use kartik\daterange\DateRangePicker;
use kartik\number\NumberControl;
use yii\bootstrap4\Modal;
use yii\helpers\Url;
use yii\grid\GridView;
use app\models\ItemSearch;


/* @var $this yii\web\View */
/* @var $model app\models\Item */
/* @var $model_modifier app\models\ItemModifier */
/* @var $form yii\widgets\ActiveForm */

$formatter = \Yii::$app->formatter;
?>

<div class="item-form">

    <?php $form = ActiveForm::begin([ 'id' => 'item-form',]); ?>
    <div class="row">
        <div class="col-md-8">
            <div class="row">
                <div class="col-md-4">
                    <?= $form->field($model, 'BARCODE',['enableAjaxValidation' => true])->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-md-8">
                    <?= $form->field($model, 'NAME')->textInput(['maxlength' => true]) ?>
                </div>
            </div>


            <div class="row">
                <div class="col-md-4">
                    <?= $form->field($model, 'ID_TYPE_ITEM')->dropDownList(
                        ArrayHelper::map(TypeItem::find()->all(), 'ID', 'NAME'),
                        [
                            'prompt' => 'Select Type Item',
                            'disabled' => ($this->context->action->id == 'update')
                        ]
                    )
                    ?>
                </div>
                <div class="col-md-8">
                    <?= $form->field($model, 'ID_CATEGORY')->dropDownList(
                        ArrayHelper::map(Category::find()->all(), 'ID', 'NAME'),
                        [
                            'prompt' => 'Select Category Item',
                            'onChange' => '
                            $.get( "catid?ID=' . '"+$(this).val(), function(data) {
                                console.log(data);
                                var taxrate = data.split(",");
                                $( "#item-id_tax" ).val( taxrate[0]);
                                $( "#item-taxrate" ).val( parseFloat(taxrate[1]));
                                calculateform();
                            });'
                        ]
                    )
                    ?>
                </div>
            </div>
            <?php if (!($this->context->action->id == 'update' && $model->ID_TYPE_ITEM == 'P' && isset($_GET['CHILD'])) ) : ?>
            <div class="row">
                <div class="col-md-2">
                    <?=
                    $form->field($model, 'PRICE_COST')->widget(NumberControl::class, [
                        'maskedInputOptions' => [
                            'prefix' => '$ ',
                            'suffix' => '',
                            'allowMinus' => false
                        ],
                        'displayOptions' => ['class' => 'form-control kv-monospace'],
                    ]);
                    ?>
                </div>
                <div class="col-md-2">
                    <?=
                    $form->field($model, 'PRICE_SELL')->widget(NumberControl::class, [
                        'maskedInputOptions' => [
                            'prefix' => '$ ',
                            'suffix' => '',
                            'allowMinus' => false
                        ],
                    ]); ?>
                </div>
                <div class="col-md-2">
                    <?= $form->field($model, 'ID_TAX')->dropDownList(
                        ArrayHelper::map(Tax::find()->all(), 'ID', 'NAME'),
                        [
                            'prompt' => 'Select Tax',
                            'onChange' => '
                                if($(this).val() != "-1")
                                    $.get( "taxid?ID=' . '"+$(this).val(), function(data) {
                                        console.log(data);
                                        var taxrate = data.split(",");
                                        $( "#item-id_tax" ).val( taxrate[0]);
                                        $( "#item-taxrate" ).val( parseFloat(taxrate[1]));
                                        calculateform();
                            });'
                        ]
                    )
                    ?>
                </div>
                <?php if ($this->context->action->id == 'update') : ?>
                    <div class="col-md-3">
                        <?= $form->field($model, 'MARGIN')->textInput([
                            'value' => $formatter->asDecimal($model->MARGIN),
                            'readonly' => true,
                        ]); ?>
                    </div>
                    <div class="col-md-3">
                        <?= $form->field($model, 'PRICE_TAX')->textInput([
                            'value' => $formatter->asDecimal($model->PRICE_TAX),
                            'readonly' => true,
                        ]); ?>
                    </div>
                <?php endif; ?>

                <?php if ($this->context->action->id == 'create') : ?>
                    <div class="col-md-3">
                        <?= $form->field($model, 'MARGIN')->textInput(['readonly' => true,]); ?>

                    </div>
                    <div class="col-md-3">
                        <?= $form->field($model, 'PRICE_TAX')->textInput([
                            'readonly' => true,
                        ]); ?>
                    </div>
                <?php endif; ?>
            </div>
            
            <div class="row">

                <div class="col-md-2">
                    <?= $form->field($model, 'ON_SALE')->checkbox([
                        'onclick' => 'if(this.checked){
                        //console.log("CHECKBOX CLICKED");
                        $("#item-init").prop("disabled", false);
                        $("#item-end").prop("disabled", false);
                    } else {
                        //console.log("NO CHECKBOX CLICKED");
                        $("#item-init").prop("disabled", true);
                        $("#item-end").prop("disabled", true);
                    }'

                    ]) ?>
                </div>

                <div class="col-md-5">
                    <?php // $form->field($model, 'INIT')->textInput() 
                    ?>
                    <?= $form->field($model, 'INIT')->widget(
                        DateRangePicker::class,
                        [
                            'options' => ['placeholder' => 'Select start date'],
                            'convertFormat' => true,
                            'disabled' => ($this->context->action->id == 'create') ? true : !$model->ON_SALE,
                            'pluginOptions' => [
                                'singleDatePicker' => true,
                                'timePicker' => true,
                                'timePickerIncrement' => 30,
                                'locale' => [
                                    'format' => 'Y-m-d H:i:s'
                                ]
                            ]
                        ]
                    );
                    ?>
                </div>
                <div class="col-md-5">
                    <?php // $form->field($model, 'END')->textInput() 
                    ?>
                    <?= $form->field($model, 'END')->widget(
                        DateRangePicker::class,
                        [
                            'options' => ['placeholder' => 'Select end date'],
                            'convertFormat' => true,
                            'disabled' => ($this->context->action->id == 'create') ? true : !$model->ON_SALE,
                            'pluginOptions' => [
                                'singleDatePicker' => true,
                                'timePicker' => true,
                                'timePickerIncrement' => 30,
                                'locale' => [
                                    'format' => 'Y-m-d H:i:s'
                                ]
                            ]
                        ]
                    );
                    ?>
                </div>
            </div>

            <?php endif; ?>

            <?= $form->field($model, 'DESCRIPCION')->textarea(['rows' => 6]) ?>

            <?= $form->field($model, 'IS_SHOW')->checkbox() ?>

            <?= $form->field($model, 'ACTIVE')->checkbox(['checked' => ($this->context->action->id == 'create') ? true : $model->ACTIVE]) ?>

            <div class="form-group">
                <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
            </div>
        </div>

        <div class="col-md-4">
            <?php if ($this->context->action->id == 'create') : ?>
                <?= $form->field($model, 'file')->widget(FileInput::class, [
                    'options' => ['accept' => 'image/*'],
                ]); ?>
            <?php endif; ?>
            <?php if ($this->context->action->id == 'update') : ?>
                <?= $form->field($model, 'file')->widget(FileInput::class, [
                    'options' => ['accept' => 'image/*'],
                    'pluginOptions' => [
                        'showUpload' => false,
                        'initialPreview' => [
                            Yii::$app->getHomeUrl() . 'uploads/items/' . $model->IMAGE
                        ],
                        'initialPreviewAsData' => true,
                    ],
                ]); ?>
            <?php endif; ?>
        </div>
    </div>

    <?= $form->field($model, 'FIELD')->hiddenInput(['value' => $model->rate, 'id' => 'item-taxrate'])->label(false); ?>

    <?php ActiveForm::end(); ?>

</div>

<!--
    Modificadores y Modales
-->

<?php if ($this->context->action->id == 'update' && $model->ID_TYPE_ITEM == 'P') : ?>
    <?php
        $model_modifier = new ItemModifier();
        $model_modifier->ID_PARENT = $model->ID;
        $model_modifier->ID_TYPE_ITEM = $model->ID_TYPE_ITEM;
        $model_modifier->ID_CATEGORY = $model->ID_CATEGORY;
    ?>
    <div class="item-mod-form">
    <hr/>
        <h2>List Modifier</h2>
        <p>
        <?php Modal::begin([
            'title' => 'Add Modifier',
            'toggleButton' => ['label' => 'Add Modifier', 'class' => 'btn btn-primary'],
            'size' => 'modal-xl',
        ]) ?>
        
        <?php $formModifier = ActiveForm::begin([
                        'action' => 'create-modifier', 
                        'id' => 'modal_modifier', 
                        'method' => 'post']
                        ) ?>
        <?= $formModifier->field($model_modifier, 'ID_PARENT')->hiddenInput()->label(false) ?>
        <?= $formModifier->field($model_modifier, 'ID_TYPE_ITEM')->hiddenInput()->label(false) ?>
        <?= $formModifier->field($model_modifier, 'ID_CATEGORY')->hiddenInput()->label(false) ?>
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-4">
                        <?= $formModifier->field($model_modifier, 'BARCODE',['enableAjaxValidation' => true])->textInput(['maxlength' => true])->label('Barcode') ?>
                    </div>
                    <div class="col-lg-8">
                        <?= $formModifier->field($model_modifier, 'NAME')->textInput(['maxlength' => true])->label('Name') ?>
                    </div>
                </div>


                <div class="row">
                    <div class="col-lg-2">
                        <?= $formModifier->field($model_modifier, 'PRICE_COST')->widget(NumberControl::class, [                           
                            'maskedInputOptions' => [
                                'prefix' => '$ ',
                                'suffix' => '',
                                'allowMinus' => false
                            ],
                            'displayOptions' => ['class' => 'form-control kv-monospace'],
                        ])->label("Price cost")?>
                    </div>
                    <div class="col-lg-2">
                        <?= $formModifier->field($model_modifier, 'PRICE_SELL')->widget(NumberControl::class, [
                        
                            'maskedInputOptions' => [
                                'prefix' => '$ ',
                                'suffix' => '',
                                'allowMinus' => false
                            ],
                        ]) ?>
                    </div>
                    <div class="col-lg-4">
                        <?= $formModifier->field($model_modifier, 'ID_TAX')->dropDownList(
                            ArrayHelper::map(Tax::find()->all(), 'ID', 'NAME'),
                            [                                                               
                                'prompt' => 'Select Tax',
                                'onChange' => '
                                    if($(this).val() != "-1")
                                        $.get( "taxid?ID=' . '"+$(this).val(), function(data) {
                                            console.log(data);
                                            var taxrateMod = data.split(",");
                                            $( "#itemmodifier-id_tax" ).val( taxrateMod[0]);
                                            $( "#itemmodifier-taxrate" ).val( parseFloat(taxrateMod[1]));
                                            calculateform_modifier();
                                 });'
                            ]
                        ) ?>
                    </div>
                    <div class="col-lg-2">
                        <?= $formModifier->field($model_modifier, 'MARGIN')->textInput([
                            'readonly' => true,
                        ]) ?>
                    </div>
                    <div class="col-lg-2">
                        <?= $formModifier->field($model_modifier, 'PRICE_TAX')->textInput([
                            'value' => '0',
                            'readonly' => true,
                        ]) ?>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-2">
                        <?= $formModifier->field($model_modifier, 'ON_SALE')->checkbox([
                            'onclick' => '
                                if(this.checked){
                                    $("#itemmodifier-init").prop("disabled", false);
                                    $("#itemmodifier-end").prop("disabled", false);
                                } else {
                                    $("#itemmodifier-init").prop("disabled", true);
                                    $("#itemmodifier-end").prop("disabled", true);
                                }'
                        ]) ?>
                    </div>
                    <div class="col-lg-5">
                        <?= $formModifier->field($model_modifier, 'INIT')->widget(
                            DateRangePicker::class,
                            [
                                'options' => ['placeholder' => 'Select start date'],
                                'convertFormat' => true,
                                'disabled' => true,                              
                                'pluginOptions' => [
                                    'singleDatePicker' => true,
                                    'timePicker' => true,
                                    'timePickerIncrement' => 30,
                                    'locale' => [
                                        'format' => 'Y-m-d H:i:s'
                                    ]
                                ]
                            ]
                        ) ?>
                    </div>
                    <div class="col-lg-5">
                        <?= $formModifier->field($model_modifier, 'END')->widget(
                            DateRangePicker::class,
                            [
                                'options' => ['placeholder' => 'Select end date'],
                                'convertFormat' => true,
                                'disabled' => true,
                                'pluginOptions' => [
                                    'singleDatePicker' => true,
                                    'timePicker' => true,
                                    'timePickerIncrement' => 30,
                                    'locale' => [
                                        'format' => 'Y-m-d H:i:s'
                                    ]
                                ]
                            ]
                        ) ?>
                    </div>
                </div>



            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <?= $formModifier->field($model_modifier, 'DESCRIPCION')->textarea(['rows' => 10]) ?>

                <?= $formModifier->field($model_modifier, 'IS_SHOW')->checkbox() ?>

                <?= $formModifier->field($model_modifier, 'ACTIVE')->checkbox() ?>


                <div class="form-group">
                    <?= Html::submitButton('Save Modifier', ['class' => 'btn btn-success']) ?>
                </div>

            </div>

            <div class="col-lg-6">
                <?= $formModifier->field($model_modifier, 'file')->widget(FileInput::class, [
                    'options' => ['accept' => 'image/*', 'id' => 'modal-image'],
                    'pluginOptions' => [
                        'showUpload' => false,    
                        'initialPreviewAsData' => true,
                    ],
                ]) ?>
            </div>
        </div>
        <?= $form->field($model, 'FIELD')->hiddenInput(['value' => $model->rate, 'id' => 'itemmodifier-taxrate'])->label(false); ?>
        <?php $formModifier::end() ?>
        <?php Modal::end() ?>
        </p>
        <?php
        $searchModel = new ItemSearch();
        $dataProvider = $searchModel->searchParent($model->ID);
        ?>

        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                [
                    'attribute' => 'IMAGE',
                    'format' => 'raw',
                    'headerOptions' => ['style' => 'width:90px; white-space:normal; word-break:break-word;'],
                    'value' => function ($model) {
                        return Html::img(yii\helpers\Url::to("../uploads/items/" . $model->IMAGE), ['height' => '70px',]);
                    },
                ],
                'BARCODE',
                'NAME',


                [
                    'attribute' => 'ID_TAX',
                    'value' => 'tax.NAME',
                    'headerOptions' => ['style' => 'width:90px; white-space:nowrap; text-overflow:ellipsis; overflow:hidden;'],
                ],
                'PRICE_TAX:currency',
                [
                    'attribute' => 'ID_CATEGORY',
                    'value' => 'category.NAME',

                ],

                'ACTIVE:boolean',

                // [
                //     'class' => ActionColumn::class,
                //     'urlCreator' => function ($action, Item $model, $key, $index, $column) {
                //         return Url::toRoute([$action, 'ID' => $model->ID]);
                //     }
                // ],
            ],
        ]); ?>



    </div>
<?php endif; ?>

<?php
$this->registerJs("function formatAsPercent(num) {
    return new Intl.NumberFormat('en-US', {
      
      minimumFractionDigits: 2,
      maximumFractionDigits: 2,
    }).format(num );
  }", View::POS_END, "function-format-percent");

$this->registerJs("function formatAsCurrency(num) {
    return new Intl.NumberFormat('en-US', {      
      currency: 'USD',
      minimumFractionDigits: 2,
      maximumFractionDigits: 2,
    }).format(num);
  }", View::POS_END, "function-format-currency");

$this->registerJs("function calculateform() {
    var rate = $('#item-taxrate').val();
    rate = parseFloat(rate) + 1;
    //console.log(rate);
    var pricebuy  = $('#item-price_cost-disp' ).val().replace(/[$,]/g,'');
    var pricesell = $('#item-price_sell-disp' ).val().replace(/[$,]/g,'');
    //console.log(pricebuy);
    //console.log(pricesell);
    var margin = 0.00;
    if(pricesell > 0 && pricebuy > 0){
        margin = pricesell / pricebuy;
        margin = (margin - 1) * 100;
    }
    $('#item-margin').val(formatAsPercent(margin).replace(/[$,]/g,''));    
    //$('#item-margin').val(margin);
    var pricetax = pricesell * rate;
    //console.log(pricetax);
    $('#item-price_tax').val(formatAsCurrency(pricetax).replace(/[$,]/g,''));
}", View::POS_END, "function-price-calculator");

$this->registerJs("$('#item-price_cost-disp' ).keyup(function() {
    calculateform();
});", View::POS_END, "item-calculator1");

$this->registerJs("$('#item-price_sell-disp' ).keyup(function() {
    calculateform();
});", View::POS_END, "item-calculator2");


$this->registerJs("function calculateform_modifier() {
    var rateMod = $('#itemmodifier-taxrate').val();
    rateMod = parseFloat(rateMod) + 1;
    //console.log(rateMod);
    var pricebuyMod  = $('#itemmodifier-price_cost-disp' ).val().replace(/[$,]/g,'');
    var pricesellMod = $('#itemmodifier-price_sell-disp' ).val().replace(/[$,]/g,'');
    //console.log(pricebuyMod);
    //console.log(pricesellMod);
    var marginMod = 0.00;
    if(pricesellMod > 0 && pricebuyMod > 0){
        marginMod = pricesellMod / pricebuyMod;
        marginMod = (marginMod - 1) * 100;
    }
    $('#itemmodifier-margin').val(formatAsPercent(marginMod).replace(/[$,]/g,''));    
    //$('#item-margin').val(marginMod);
    var pricetaxMod = pricesellMod * rateMod;
    //console.log(pricetaxMod);
    $('#itemmodifier-price_tax').val(formatAsCurrency(pricetaxMod).replace(/[$,]/g,''));
}", View::POS_END, "function-price-calculator2");

$this->registerJs("$('#itemmodifier-price_cost-disp' ).keyup(function() {
    calculateform_modifier();
});", View::POS_END, "item-calculator1_mod");

$this->registerJs("$('#itemmodifier-price_sell-disp' ).keyup(function() {
    calculateform_modifier();
});", View::POS_END, "item-calculator2_mod");
?>