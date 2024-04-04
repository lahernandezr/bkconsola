<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Enterprise $model */

$this->title = 'Update Enterprise: ' . $model->NAME;
$this->params['breadcrumbs'][] = ['label' => 'Enterprises', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->NAME, 'url' => ['view', 'ID' => $model->ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="enterprise-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
