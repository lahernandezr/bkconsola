<?php

use yii\bootstrap4\Html;

/** @var yii\web\View $this */
/** @var app\models\Promotion $model */

$this->title = 'Crear Cupón';
$this->params['breadcrumbs'][] = ['label' => 'Cupónes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="promotion-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
