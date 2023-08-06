<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PromotionSearch */
/* @var $form yii\bootstrap4\ActiveForm */
?>

<div class="promotion-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ID') ?>

    <?= $form->field($model, 'CODE') ?>

    <?= $form->field($model, 'NAME') ?>

    <?= $form->field($model, 'DESCRIPTION') ?>

    <?= $form->field($model, 'ID_TYPE_PROMOTION') ?>

    <?php // echo $form->field($model, 'VALUE') ?>

    <?php // echo $form->field($model, 'TYPE_DISC') ?>

    <?php // echo $form->field($model, 'ID_ITEM') ?>

    <?php // echo $form->field($model, 'INIT') ?>

    <?php // echo $form->field($model, 'END') ?>

    <?php // echo $form->field($model, 'IMAGE') ?>

    <?php // echo $form->field($model, 'LINK') ?>

    <?php // echo $form->field($model, 'LIMIT_EXCHANGE') ?>

    <?php // echo $form->field($model, 'REDIMM') ?>

    <?php // echo $form->field($model, 'ACTIVE')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
