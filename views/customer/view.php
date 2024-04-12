<?php

use yii\bootstrap4\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Customer $model*/

$this->title = $model->FULLNAME;
$this->params['breadcrumbs'][] = ['label' => 'Clientes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="customer-view">

    <p>
        <?= Html::a('Actualizar', ['update', 'ID' => $model->ID], ['class' => 'btn btn-success']) ?>
        <?= Html::a('DESACTIVAR', ['delete', 'ID' => $model->ID], [
            'class' => 'btn btn-primary',
            'data' => [
                'confirm' => '¿Estas seguro de dar de baja el registro?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ID',
            'USERNAME',
            // 'PASSWORD',
            'EMAIL:email',
            'FULLNAME',
            'PHONE',
            'WHATSAPP',
            [
                'attribute' => 'ID_COUNTRY',
                'value' => $model->country->NAME  
            ],               
            'BIRTHDATE:date',
            [
                'attribute' => 'ID_GENDER',
                'value' => $model->gender->NAME  
            ],              
            'TYPE_REGISTRATION',
            'ID_REGISTRATION',
            'CREATED_AT:date',
            //'IS_OTP:boolean',
            // 'ACTIVE:boolean',
            [
                'attribute' => 'ACTIVE',
                'value' => $model->ACTIVE ? 'Si' : 'No',
            ],
        ],
        'template' => "<tr><th style='width: 30%;'>{label}</th><td>{value}</td></tr>"
    ]) ?>

</div>
