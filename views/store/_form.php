<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use kartik\file\FileInput;

/* @var $this yii\web\View */
/* @var $model app\models\Store */
/* @var $form yii\bootstrap4\ActiveForm */
?>

<div class="store-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-8">
            <?= $form->field($model, 'NAME')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'ADDRESS')->textInput(['maxlength' => true]) ?>

            <?php //$form->field($model, 'DATA_JSON')->textarea(['rows' => 6]) ?>

            <?= $form->field($model, 'ACTIVE')->checkbox() ?>

            <div class="form-group">
                <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
            </div>
        </div>
        <div class="col-md-4">

            <?php if($this->context->action->id == 'update') : ?>
            <?= $form->field($model, 'file')->widget(FileInput::classname(), [
                'options' => [
                    'accept' => 'image/*'
                ],
                'pluginOptions' => [
                    'showUpload' => false,
                    'initialPreview'=>[
                        Yii::$app->getHomeUrl() . 'uploads/stores/' . $model->IMAGE
                    ],
                    'initialPreviewAsData'=>true,
                ],
            ]);
            ?>
        <?php endif;?>

        <?php if($this->context->action->id == 'create') :?>
            <?= $form->field($model, 'file')->widget(FileInput::classname(), [
                'options' => [
                    'accept' => 'image/*'
                ],
                'pluginOptions' => [
                    'showUpload' => false,
                ],
            ]);
            ?>
        <?php endif;?>

        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>