<?php

use yii\bootstrap4\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Store */

$this->title = 'Actualizar Sucursal: ' . $model->NAME;
$this->params['breadcrumbs'][] = ['label' => 'Sucursales', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->NAME, 'url' => ['view', 'ID' => $model->ID]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="store-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
