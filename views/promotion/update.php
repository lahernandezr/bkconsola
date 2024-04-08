<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Promotion */

$this->title = 'Actualizar Promocion: ' . $model->CODE;
$this->params['breadcrumbs'][] = ['label' => 'Promociones', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->NAME, 'url' => ['view', 'ID' => $model->ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="promotion-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
