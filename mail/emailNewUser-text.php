<?php

/** @var yii\web\View $this */
/** @var common\models\User $user */

$resetLink = Yii::$app->urlManager->createAbsoluteUrl(['site/login']);
?>
Hello <?= $user->USERNAME ?>,

This is your temporaly password: <?= $user->temp ?>

