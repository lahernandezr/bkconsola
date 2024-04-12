<?php

use yii\bootstrap4\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Enterprise $model */

$this->title = $model->NAME;
$this->params['breadcrumbs'][] = ['label' => 'Empresas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="enterprise-view">

    <p>
    <?= Html::a('Actualizar', ['update', 'ID' => $model->ID], ['class' => 'btn btn-success']) ?>
        <?= Html::a('DESACTIVAR', ['delete', 'ID' => $model->ID], [
            'class' => 'btn btn-primary',
            'data' => [
                'confirm' => '¿Estas seguro de desactivar el registro?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ID',
            'CODE',
            'NAME',
            'ADDRESS',
            'NIT',
            'RUT',
            'EMAIL:email',
            'CONTACT',
            'PHONE',
            'CREATED_AT',
            // 'ACTIVE',
            [
                'attribute' => 'ACTIVE',
                'value' => $model->ACTIVE ? 'Si' : 'No',
            ],
        ],
        'template' => "<tr><th style='width: 30%;'>{label}</th><td>{value}</td></tr>"
    ]) ?>

</div>
