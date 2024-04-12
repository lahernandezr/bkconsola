<?php

use yii\bootstrap4\Html;

/** @var yii\web\View $this */
/** @var app\models\Enterprise $model */

$this->title = 'Agregar Empresa';
$this->params['breadcrumbs'][] = ['label' => 'Enterprises', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="enterprise-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
