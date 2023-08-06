<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap4\ActiveForm $form */
/** @var \common\models\LoginForm $model */

use app\models\GlobalConfig;
use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;

$this->title = 'Login';
$parname = GlobalConfig::findOne("ENTERPRISE");
$parname =  ($parname)? $parname->VALUE:"";
?>
<div class="site-login">
    
    <div class="mt-5 offset-lg-3 col-lg-6">            
        <div class="text-center pb-4">
            <img src="<?= Yii::$app->getHomeUrl(); ?>/images/burger-king-256.png" alt="AdminLTE Logo" class="brand-image  " style="opacity: .8">
        </div>
        <div class="card">
            <div class="card-header  bg-orange">
                <h3 class="card-title"><?= Html::encode($parname) ?></h3>
            </div>
            <div class="card-body">
                <p>Por favor ingresa los campos requeridos:</p>

                <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
                    <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>
                    <?= $form->field($model, 'password')->passwordInput() ?>
                    <?= $form->field($model, 'rememberMe')->checkbox() ?>
                    <div class="form-group">
                        <?= Html::submitButton('Login', ['class' => 'btn btn-primary btn-block', 'name' => 'login-button']) ?>
                    </div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>
