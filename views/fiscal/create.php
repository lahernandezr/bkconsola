<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Fiscal */

$this->title = 'Create Fiscal';
$this->params['breadcrumbs'][] = ['label' => 'Fiscals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fiscal-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
