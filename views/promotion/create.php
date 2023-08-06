<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Promotion */

$this->title = 'Crear Promoción';
$this->params['breadcrumbs'][] = ['label' => 'Promociones', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="promotion-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
