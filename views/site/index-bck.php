<?php

/** @var yii\web\View $this */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron text-center bg-transparent">
        <h1 class="display-4">Welcome!</h1>
<!--
        <p class="lead">You have successfully created your Yii-powered application.</p>

        <p><a class="btn btn-lg btn-success" href="http://www.yiiframework.com">Get started with Yii</a></p>-->
    </div>

    <div class="body-content">
        <div class="row">
            <div class="col-lg-6">
                <img src="<?= Yii::$app->getHomeUrl(); ?>/images/laptop.jpg" class="img-fluid" alt="Responsive image" />
            </div>
            <div class="col-lg-6">
                <h2>Admin</h2>
                <h3>Manage your applicaction</h3>
                <p>Easly add users, manage categories, items and configure security and setting so your data stays safe. Adminsitration shouldn't need a manual</p>
            </div>

            <div class="col-lg-6">
                <h2>App Feautes</h2>
                <h3>Android and IOS</h3>
                <p>Change information in your application with limitless and anyplace.</p>
            </div>
            <div class="col-lg-6">
                <img src="<?php echo Yii::$app->getHomeUrl(); ?>/images/laptop.jpg" class="img-fluid" alt="Responsive image" />
            </div>            

        </div>
       
    </div>
</div>
