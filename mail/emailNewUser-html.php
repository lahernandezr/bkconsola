<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\User $user */

$verifyLink = Yii::$app->urlManager->createAbsoluteUrl(['site/login']);
?>
<div class="new-user">
    <p>Hello <?= Html::encode($user->USERNAME) ?>,</p>

    <p>his is your temporaly password <?= Html::encode($user->temp) ?></p>
</div>
