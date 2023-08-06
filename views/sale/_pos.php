<?php

use app\models\Customer;
use app\models\Item;
use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\web\JsExpression;
use yii\web\View;
use fedemotta\datatables\DataTables;
use kartik\number\NumberControl;

/* @var $this yii\web\View */
/* @var $model app\models\Sale */
/* @var $form yii\bootstrap4\ActiveForm */
$url = \yii\helpers\Url::to(['customer-list']);
$urlItem = \yii\helpers\Url::to(['item-list']);


$dataList = Customer::find()->andWhere(['ID' => $model->ID_USER])->all();
$data = ArrayHelper::map($dataList, 'ID', 'FULLNAME');

$dataListItem = Item::find()->andWhere(['ID' => -1])->all();
$dataItem = ArrayHelper::map($dataList, 'ID', 'NAME');

?>

<div class="sale-form pt-3 pl-4 pr-4">
    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-md-8">
            <div class="row">
                <div class="col-md-8">
                    <a class="btn btn-app bg-blue" id="btn-customer" data-toggle="modal" data-target="#customerModal"> 
                    <i class="fas fa-user-circle"></i>Customers
                    </a> 
                    <a class="btn btn-app bg-blue" id="btn-customer" data-toggle="modal" data-target="#customerModal"> 
                    <i class="fas fa-user-circle"></i>Customers
                    </a> 
                    <a class="btn btn-app bg-blue" id="btn-customer" data-toggle="modal" data-target="#customerModal"> 
                    <i class="fas fa-user-circle"></i>Customers
                    </a>                                           
                </div>
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-md-12">
                            <label class="control-label">Products</label>
                            <?= Select2::widget([
                                'name' => 'add-item',
                                'data' => $dataItem,                
                                'options' => ['placeholder' => 'Select a product ...'],
                                'pluginOptions' => [
                                    'allowClear' => true,
                                    'minimumInputLength' => 3,
                                    'language' => [
                                        'errorLoading' => new JsExpression("function () { return 'Waiting for results...'; }"),
                                    ],    
                                    'ajax' => [
                                        'url' => $urlItem,
                                        'dataType' => 'json',
                                        'data' => new JsExpression('function(params) { return {q:params.term}; }')
                                    ],    
                                    'escapeMarkup' => new JsExpression('function (markup) { return markup; }'),
                                    'templateResult' => new JsExpression('function(item) { return item.text; }'),        
                                    'templateSelection' => new JsExpression('function (item) { return item.text; }'),                
                                ],
                            ]);
                            ?>   
                        </div>
                        <div class="col-md-12">
                            <!--<label class="control-label">Quantity</label>-->
                            <?= NumberControl::widget( [
                                    'name' => 'sale-qty',
                                    'value' => null,
                                    'maskedInputOptions' => [
                                        'prefix' => '',
                                        'suffix' => '',
                                        'allowMinus' => false
                                    ],
                                ]); ?>                            
                        </div>
                        <div class="col-md-12">
                            <!--<label class="control-label">Action</label>-->
                             <a class="btn btn-block btn-success" onclick="clickAddItem()"><i class="fas fa-plus-circle"></i> Add</a>                            
                        </div>                        
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4"> <!-- fecha del dia -->
            <?= $form->field($model, 'FIELD')->textInput(                
                        ['maxlength' => true, 
                         'value' => date('d/m/Y'), 
                         'id' => 'sale-date',
                         'readonly'=> true,
                        ])->label('Date'); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-9">
            <div class="row">
                <div class="col-md-8">   
                   
                </div>
                <div class="col-md-2">   
                
                </div>
                <div class="col-md-2">   

                </div>                
            </div>         
        </div>
        <div class="col-md-3">
            <h1 class="display-4 text-right"> $ 9,999.99</h1>
        </div>
    </div>
    <div class="row mb-4">
        
    </div>
    <div class="row">
        <div class="col-md-6">
            <table id="list-items" class="display">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Barcode</th>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Qty</th>
                        <th>Total</th>
                    </tr>
                </thead>
            </table>
        </div>
        <div class="col-md-1">
            <div class="row">    
                <div class="col-sm-2 col-md-12">                     
                    <a class="btn btn-app btn-block bg-red" id="btn-clear-items">
                    <i class="fas fa-trash"></i>Clear Items
                    </a>                                
                </div>
                <div class="col-sm-2 col-md-12">                     
                    <a class="btn btn-app btn-block bg-red" id="btn-delete-item">
                        <i class="fas fa-users"></i> Delete Item
                    </a>                                
                </div>
                <div class="col-sm-2 col-md-12">                     
                    <a class="btn btn-app btn-block bg-success" id="btn-up">
                        <i class="fas fa-plus"></i> Up
                    </a>                                
                </div>  
                
                <div class="col-sm-2 col-md-12">                     
                    <a class="btn btn-app btn-block bg-success" id="btn-down">
                        <i class="fas fa-minus"></i> Down
                    </a>                                
                </div>  
                <div class="col-sm-2 col-md-12">                     
                    <a class="btn btn-app btn-block bg-success" id="btn-down">
                    <i class="fas fa-tag"></i>Category
                    </a>                                
                </div>  
                <div class="col-sm-2 col-md-12">                     
                    <a class="btn btn-app btn-block bg-success" id="btn-down">
                        <i class="fas fa-minus"></i> Down
                    </a>                                
                </div>                                  
                                                                                                                                
                <!--
                <div class="col-md-12">
                    <?= $form->field($model, 'SUBTOTAL')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-md-12">
                    <?= $form->field($model, 'TAXES')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-md-12">
                    <?= $form->field($model, 'TOTAL')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-md-12">
                    <?= $form->field($model, 'TENDER')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-md-12">
                    <?= $form->field($model, 'PAYMENTS')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-md-12">
                    <?= $form->field($model, 'CHANGED')->textInput(['maxlength' => true]) ?>
                </div>
                -->
            </div>
        </div>   
        <div class="col-md-5">
            <table id="list-category" class="display">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Barcode</th>
                        <th>Product</th>
                        <th>Price</th>
                    </tr>
                </thead>
            </table>            
        </div>   
    </div>
   
    <?= $form->field($model, 'NOTES')->textInput(['maxlength' => true]) ?>

    <?php //$form->field($model, 'CREATED_AT')->textInput() ?>

    <?php //$form->field($model, 'ACTIVE')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton('Save Sale', ['class' => 'btn btn-success']) ?>
        <?= Html::button('Clear Sale', ['class' => 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<!--modal customer -->

<div class="modal fade" id="customerModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Select Customer</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <?= $form->field($model, 'ID_USER')->widget(Select2::classname(), [
                    'data' => $data,
                    'options' => ['multiple'=>false,'placeholder' => 'Select a customer ...'],
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
                        'templateResult' => new JsExpression('function(customer) { return customer.text; }'),        
                        'templateSelection' => new JsExpression('function (customer) { return customer.text; }'),
                        ],
                    ]);
                    ?>

<?= $form->field($model, 'ID_ADDRESS')->textInput() ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>



<?php

$this->registerJs("
var table, category;
var items = [];

$(document).ready( function () {
    
    if(localStorage.getItem(\"items\") == undefined || localStorage.getItem(\"items\") == null || localStorage.getItem(\"items\") == ''){
        saveData();
    }
    readData();
    table = $('#list-items').DataTable(
        {
            footer:true,
            columns: [
                { visible: false, },
                { visible: false,width:150 },
                { visible: true },
                { visible: true },
                { visible: true,width:80 },
                { visible: true },

            ],            
            ajax: function (data, callback, settings) {
                callback({ data: items }) //reloads data 
            },            
            scrollY: 450
        });
    category = $('#list-category').DataTable(
        {
            footer:true,
            columns: [
                { visible: false, },
                { visible: true,width:150 },
                { visible: true },
                { visible: true },

            ],            
            ajax: function (data, callback, settings) {
                callback({ data: items }) //reloads data 
            },            
            scrollY: 450
        });
    $('#list-items tbody').on('click', 'tr', function () {
        if ($(this).hasClass('selected')) {
            $(this).removeClass('selected');
        } else {
            table.$('tr.selected').removeClass('selected');
            $(this).addClass('selected');
        }
    });

} );
", View::POS_END, "table-items");
$this->registerJs("

    $('#btn-clear-items').click(function () {
        clearItems();
        
    });

    $('#btn-delete-item').click(function () {
        table.row('.selected').remove().draw(false);
    });

    $('#btn-up').click(function () {
        index = table.row('.selected').index();
        console.log(index);
        row = items[index];
        console.log(row);
        row[4] = row[4] + 1;
        items[index] = row;
        saveData();
        table.ajax.reload();
    });

    $('#btn-down').click(function () {
        index = table.row('.selected').index;
        console.log(index);
        row = items[index];
        console.log(row);
        row[4] = row[4] - 1;
        items[index] = row;
        saveData();
    });

    function saveData(){
        localStorage.setItem(\"items\", JSON.stringify(items));        
    }
    function readData(){
        items = JSON.parse(localStorage.getItem(\"items\"));
    }
    function clearItems(){
        items = [];
        saveData();
        table.clear().draw();
    }

    function deleteItem(position){
        
    }
    function clickAddItem(){
        addItem(1,'00000010','Item Name',2.25,1);
    }
    function addItem(id,barcode,name,price,qty){
        row = [id,barcode,name,price,qty,1];
        items.push(row);        
        saveData();        
        table.ajax.reload();
    }
", View::POS_END, "function-items");
?>