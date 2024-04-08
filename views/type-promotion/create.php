<?php

use yii\bootstrap4\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TypePromotion */

$this->title = 'Create Type Promotion';
$this->params['breadcrumbs'][] = ['label' => 'Type Promotions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="type-promotion-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
