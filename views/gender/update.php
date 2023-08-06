<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Gender */

$this->title = 'Update Gender: ' . $model->NAME;
$this->params['breadcrumbs'][] = ['label' => 'Genders', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->NAME, 'url' => ['view', 'ID' => $model->ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="gender-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
