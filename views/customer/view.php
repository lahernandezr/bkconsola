<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Customer */

$this->title = $model->USERNAME;
$this->params['breadcrumbs'][] = ['label' => 'Clientes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="customer-view">

    <p>
        <?= Html::a('Actualizar', ['update', 'ID' => $model->ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Dar de Baja', ['delete', 'ID' => $model->ID], [
            'class' => 'btn btn-danger',
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
            'BIRTHDATE',
            [
                'attribute' => 'ID_GENDER',
                'value' => $model->gender->NAME  
            ],              
            'TYPE_REGISTRATION',
            'ID_REGISTRATION',
            'CREATED_AT',
            //'IS_OTP:boolean',
            'ACTIVE:boolean',
        ],
    ]) ?>

</div>
