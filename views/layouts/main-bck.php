<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap4\Breadcrumbs;
use yii\bootstrap4\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <link rel="shortcut icon" href="<?php echo Yii::$app->getHomeUrl(); ?>/favicon.ico" type="image/x-icon" />
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode(Yii::$app->name) ?></title>
    <?php $this->head() ?>
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>

<header>
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar navbar-expand-md navbar-dark bg-dark fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav ml-auto'],
        'items' => [
            ['label' => 'Home', 'url' => ['/site/index']],
            [
                'label' => 'Actions', 
                'items' => [
                    '<h6 class="dropdown-header">ADD</h6>',
                    ['label' => 'Category', 'url' => ['/category/index']],
                    ['label' => 'Item', 'url' => ['/item/index']],
                    ['label' => 'Promotion', 'url' => ['/promotion/index']],
                    ['label' => 'Sale', 'url' => ['/sale/index']],

                ]
            ],
            [
                'label' => 'Reports', 
                'items' => [
                    '<h6 class="dropdown-header">PRODUCTS REPORT</h6>',                    
                    ['label' => 'Products Sale', 'url' => ['/sale/index']],

                    '<div class="dropdown-divider"></div>',
                    '<h6 class="dropdown-header">SALE REPORT</h6>',                    
                    ['label' => 'Sale', 'url' => ['/sale/index']],
                    '<div class="dropdown-divider"></div>',
                    '<h6 class="dropdown-header">PRODUCTS REPORT</h6>',                    
                    ['label' => 'Promotions', 'url' => ['/sale/index']],                    
                    //['label' => 'Sale Item', 'url' => ['/sale-item/index']],

                ]
            ],     
                                 
            [
                'label' => 'Config', 
                'items' => [

                    '<div class="dropdown-divider"></div>',
                    '<h6 class="dropdown-header">USER</h6>',
                    ['label' => 'User Console', 'url' => ['/user-console/index']],
                    ['label' => 'User Address', 'url' => ['/user-address/index']],
                    ['label' => 'User Promotion', 'url' => ['/user-promotion/index']],   

                    '<div class="dropdown-divider"></div>',
                    '<h6 class="dropdown-header">SALE</h6>',  
                    ['label' => 'Type Payment', 'url' => ['/type-payment/index']],
                    ['label' => 'Store', 'url' => ['/store/index']],

                    '<div class="dropdown-divider"></div>',
                    '<h6 class="dropdown-header">SETTINGS</h6>',                    
                    ['label' => 'Global', 'url' => ['/global-config/index']],
                    ['label' => 'Fiscal', 'url' => ['/fiscal/index']],
                ]
            ],            
            ['label' => 'About', 'url' => ['/site/about']],
            ['label' => 'Contact', 'url' => ['/site/contact']],
            Yii::$app->user->isGuest ? (
                ['label' => 'Login', 'url' => ['/site/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post', ['class' => 'form-inline'])
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>'
            )
        ],
    ]);
    NavBar::end();
    ?>
</header>

<main role="main" class="flex-shrink-0">
    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</main>

<footer class="footer mt-auto py-3 text-muted">
    <div class="container">
        <p class="float-left">&copy; New Software Group <?= date('Y') ?></p>
        <p class="float-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
