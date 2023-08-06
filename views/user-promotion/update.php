<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\UserPromotion */

$this->title = 'Update User Promotion: ' . $model->ID;
$this->params['breadcrumbs'][] = ['label' => 'User Promotions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID, 'url' => ['view', 'ID' => $model->ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="user-promotion-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
