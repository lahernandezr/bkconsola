<?php

use yii\bootstrap4\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SaleItem */

$this->title = 'Update Sale Item: ' . $model->NAME;
$this->params['breadcrumbs'][] = ['label' => 'Sale Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->NAME, 'url' => ['view', 'ID' => $model->ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="sale-item-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
