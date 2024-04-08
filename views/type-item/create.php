<?php

use yii\bootstrap4\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TypeItem */

$this->title = 'Create Type Item';
$this->params['breadcrumbs'][] = ['label' => 'Type Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="type-item-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
