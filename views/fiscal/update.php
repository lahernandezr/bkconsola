<?php

use yii\bootstrap4\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Fiscal */

$this->title = 'Update Fiscal: ' . $model->ID;
$this->params['breadcrumbs'][] = ['label' => 'Fiscals', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID, 'url' => ['view', 'ID' => $model->ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="fiscal-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
