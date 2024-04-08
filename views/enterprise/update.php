<?php

use yii\bootstrap4\Html;

/** @var yii\web\View $this */
/** @var app\models\Enterprise $model */

$this->title = 'Actualizar Empresa: ' . $model->NAME;
$this->params['breadcrumbs'][] = ['label' => 'Empresas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->NAME, 'url' => ['view', 'ID' => $model->ID]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="enterprise-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
