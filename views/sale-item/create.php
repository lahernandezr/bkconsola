<?php

use yii\bootstrap4\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SaleItem */

$this->title = 'Create Sale Item';
$this->params['breadcrumbs'][] = ['label' => 'Sale Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sale-item-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
