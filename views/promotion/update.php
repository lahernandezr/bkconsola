<?php

use yii\bootstrap4\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Promotion */

$this->title = 'Actualizar Cupón: ' . $model->CODE;
$this->params['breadcrumbs'][] = ['label' => 'Cupones', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->NAME, 'url' => ['view', 'ID' => $model->ID]];
$this->params['breadcrumbs'][] = 'Actualización';
?>
<div class="promotion-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
