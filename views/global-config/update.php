<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\GlobalConfig */

$this->title = 'Update Global Config: ' . $model->ID;
$this->params['breadcrumbs'][] = ['label' => 'Global Configs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID, 'url' => ['view', 'ID' => $model->ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="global-config-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
