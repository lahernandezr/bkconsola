<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Customer */

$this->title = 'Crear Cliente';
$this->params['breadcrumbs'][] = ['label' => 'Customers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="customer-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
