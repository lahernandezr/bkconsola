<?php

use yii\bootstrap4\Html;

/* @var $this yii\web\View */
/* @var $model app\models\UserPromotion */

$this->title = 'Actualizar Cupon ID : ' . $model->ID;
$this->params['breadcrumbs'][] = ['label' => 'Cupones', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID, 'url' => ['view', 'ID' => $model->ID]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="user-promotion-update">

    <h1><?php // Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
