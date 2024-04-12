<?php

use yii\bootstrap4\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Customer */

$this->title = 'Agregar Cliente';
$this->params['breadcrumbs'][] = ['label' => 'Clientes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="customer-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
