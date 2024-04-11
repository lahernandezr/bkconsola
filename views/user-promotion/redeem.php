<?php

use yii\bootstrap4\Html;

/* @var $this yii\web\View */
/* @var $model app\models\UserPromotion */

$this->title = 'Redimir Cupón';
$this->params['breadcrumbs'][] = ['label' => 'Redimir Cupones', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-promotion-create">

    <h1><?php // Html::encode($this->title) ?></h1>

    

    <?= $this->render('_qrform', [
        'model' => $model,
    ]) ?>

</div>
