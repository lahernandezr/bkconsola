<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Store */

$this->title = 'Crear Sucursal';
$this->params['breadcrumbs'][] = ['label' => 'Stores', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="store-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
