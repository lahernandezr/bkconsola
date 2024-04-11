<?php

use yii\bootstrap4\Html;
?>
<aside class="main-sidebar sidebar-light-orange elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="<?= Yii::$app->getHomeUrl(); ?>/images/burger-king-256.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light"><?= Html::encode(Yii::$app->name) ?></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) --> 
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?=$assetDir?>/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
            <?php if(Yii::$app->user->isGuest): ?> 
                <a href="site/login" class="d-block"><?= Html::encode("Log in") ?></a>
            <?php else: ?>
                <a href="#" class="d-block"><?= Html::encode(Yii::$app->user->identity->USERNAME) ?></a>
            <?php endif; ?>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <!-- href be escaped -->
        <!-- <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div> -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <?= \hail812\adminlte\widgets\Menu::widget([
                'items' => [
                    [
                        'label' => 'Panel de Control',
                        'icon' => 'th',
                        'badge' => '<span class="right badge badge-danger">New</span>',
                        'url' => ['site/index'],
                    ],
                    // ['label' => 'Login', 'url' => ['site/login'], 'icon' => 'sign-in-alt', 'visible' => Yii::$app->user->isGuest],
                    // ['label' => 'Gii',  'icon' => 'file-code', 'url' => ['/gii'], 'target' => '_blank'],
                    // ['label' => 'Debug', 'icon' => 'bug', 'url' => ['/debug'], 'target' => '_blank'],

                    ['label' => 'MENU', 'header' => true],
                    ['label' => 'Clientes', 'icon' => 'fa-regular fa-user', 'url' => ['customer/index']],
                    ['label' => 'Empresas', 'icon' => 'fa-solid fa-building', 'url' => ['enterprise/index']],                        
                   // ['label' => 'Category', 'icon' => 'fas fa-plus', 'url' => ['category/index']],
                   // ['label' => 'Item', 'icon' => 'fas fa-plus', 'url' => ['item/index']],
                   // ['label' => 'Sale', 'icon' => 'fas fa-plus', 'url' => ['sale/index']],
                   [
                    'label' => 'Cupones',
                    'icon' => 'fas fa-ticket-alt',                 
                    'items' => [
                            ['label' => 'Activos', 'icon' => 'fas fa-ticket-alt', 'url' => ['promotion/index']],
                            ['label' => 'Historico', 'icon' => 'fas fa-ticket-alt', 'url' => ['promotion/history']],
                        ]
                    ],
                   [
                    'label' => 'Informes',
                    'icon' => 'chart-line',
                    'items' => [
                        //['label' => 'Products Sale', 'icon' => 'file-alt', 'url' => ['#']],
                        //['label' => 'Sale', 'icon' => 'file-alt', 'url' => ['#']],
                        ['label' => 'Canjes por Cliente', 'icon' => 'file-alt', 'url' => ['#']],
                        ['label' => 'Canjes por Empresa', 'icon' => 'file-alt', 'url' => ['#']],
                        ['label' => 'Canjes por Promocion', 'icon' => 'file-alt', 'url' => ['#']],
                        ]
                    ],
                    [
                        'label' => 'Configuracion',
                        'icon' => 'fas fa-cog',
                        'items' => [
                            //['label' => 'Type Payment', 'icon' => 'fas fa-cog', 'url' => ['type-payment/index']],
                            //['label' => 'Fiscal', 'icon' => 'fas fa-cog', 'url' => ['fiscal/index']],
                            ['label' => 'Usuarios', 'icon' => 'fas fa-users', 'url' => ['user/index']],
                            ['label' => 'Sucursales', 'icon' => 'fa-solid fa-store', 'url' => ['store/index']],                            
                            ['label' => 'Global', 'icon' => 'fas fa-sliders-h', 'url' => ['global-config/index']],
                            
                        ]
                    ],
                    
                    // ['label' => 'Important', 'iconStyle' => 'far', 'iconClassAdded' => 'text-danger'],
                    // ['label' => 'Warning', 'iconClass' => 'nav-icon far fa-circle text-warning'],
                    // ['label' => 'Informational', 'iconStyle' => 'far', 'iconClassAdded' => 'text-info'],
                ],
            ]);
            ?>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>