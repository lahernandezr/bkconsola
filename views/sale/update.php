<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Sale */

$this->title = 'Update Sale: ' . $model->ID;
$this->params['breadcrumbs'][] = ['label' => 'Sales', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID, 'url' => ['view', 'ID' => $model->ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="sale-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
