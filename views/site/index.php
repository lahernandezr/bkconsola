<?php

use app\assets\ChartJSAsset;
use app\models\Customer;
use app\models\Promotion;
use app\models\Sale;
use practically\chartjs\Chart;
use app\models\Item;

Yii::$app->language='es';
ChartJSAsset::register($this);

$this->title = 'Panel de Control';
$this->params['breadcrumbs'] = [['label' => $this->title]];

$formatter = \Yii::$app->formatter;
$sales = Sale::find()->where(['>', 'CREATED_AT', date('Y-m-d 00:00:00')])->sum('TOTAL');
$salesCount = Sale::find()->where(['>', 'CREATED_AT', date('Y-m-d 00:00:00')])->count();
$promos = Promotion::find()->where(['=', 'ACTIVE', true])->count();
$user = Customer::find()->where(['=', 'ACTIVE', true])->count();

?>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <?= \hail812\adminlte\widgets\SmallBox::widget([
                // 'title' => ($sales == null) ? $formatter->asCurrency("0.0") : $formatter->asCurrency($sales),
                'title' => $promos,
                'text' => 'Redención de cupones',
                'icon' => 'fas fa-ticket-alt',
                'theme' => 'gradient-success',
                'loadingStyle' => false,
                'linkText' => 'Detalles',
                'linkUrl' => '../sale/index',
            ]) ?>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <?= \hail812\adminlte\widgets\SmallBox::widget([
                'title' => $promos,
                'text' => 'Promos Activas',
                'icon' => 'fas fa-tag',
                'theme' => 'gradient-success',
                'loadingStyle' => false,
                'linkText' => 'Detalles',
                'linkUrl' => '../promotion/index',
            ]) ?>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <?= \hail812\adminlte\widgets\SmallBox::widget([
                'title' => $user,
                'text' => 'Total Clientes',
                'icon' => 'fas fa-users',
                'theme' => 'gradient-info',
                'loadingStyle' => false,
                'linkText' => 'Detalles',
                'linkUrl' => '../item/index',
            ]) ?>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <?= \hail812\adminlte\widgets\SmallBox::widget([
                'title' => $user,
                'text' => 'Total Empresas',
                'icon' => 'fas fa-building',
                'theme' => 'gradient-info',
                'loadingStyle' => false,
                'linkText' => 'Detalles',
                'linkUrl' => '../user/index',
            ]) ?>
        </div>        
    </div>

    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header border-0">
                    <div class="d-flex justify-content-between">
                        <h3 class="card-title">Canje de Cupones</h3>
                        <a href="javascript:void(0);">Ver Reporte</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="d-flex">
                        <p class="d-flex flex-column">
                            <span class="text-bold text-lg">820</span>
                            <span>Visitors Over Time</span>
                        </p>
                        <p class="ml-auto d-flex flex-column text-right">
                            <span class="text-success">
                                <i class="fas fa-arrow-up"></i> 12.5%
                            </span>
                            <span class="text-muted">Since last week</span>
                        </p>
                    </div>

                    <div class="position-relative mb-4">
                        <div class="chartjs-size-monitor">
                            <div class="chartjs-size-monitor-expand">
                                <div class=""></div>
                            </div>
                            <div class="chartjs-size-monitor-shrink">
                                <div class=""></div>
                            </div>
                        </div>
                        <!-- <canvas id="visitors-chart" height="200" width="486" style="display: block; width: 486px; height: 200px;" class="chartjs-render-monitor"></canvas> -->
                        <?= Chart::widget([
                            'type' => Chart::TYPE_BAR,
                            'datasets' => [
                                [
                                    'data' => [
                                        'Lunes' => 10,
                                        'Martes' => 20,
                                        'Miercoles' => 32,
                                        'Jueves' => 28,
                                        'Viernes' => 30,
                                        'Sabado' => 25,
                                        'Domingo' => 45
                                    ]
                                ]
                            ]
                        ]);
                        ?>
                    </div>
                    <div class="d-flex flex-row justify-content-end">
                        <span class="mr-2">
                            <i class="fas fa-square text-primary"></i> This Week
                        </span>
                        <span>
                            <i class="fas fa-square text-gray"></i> Last Week
                        </span>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header border-0">
                    <div class="d-flex justify-content-between">
                        <h3 class="card-title">Online Store Visitors</h3>
                        <a href="javascript:void(0);">Ver Reporte</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="d-flex">
                        <p class="d-flex flex-column">
                            <span class="text-bold text-lg">820</span>
                            <span>Visitors Over Time</span>
                        </p>
                        <p class="ml-auto d-flex flex-column text-right">
                            <span class="text-success">
                                <i class="fas fa-arrow-up"></i> 12.5%
                            </span>
                            <span class="text-muted">Since last week</span>
                        </p>
                    </div>

                    <div class="position-relative mb-4">
                        <div class="chartjs-size-monitor">
                            <div class="chartjs-size-monitor-expand">
                                <div class=""></div>
                            </div>
                            <div class="chartjs-size-monitor-shrink">
                                <div class=""></div>
                            </div>
                        </div>
                        <?= Chart::widget([
                            'type' => Chart::TYPE_BAR,
                            'datasets' => [
                                [
                                    'query' => Item::find()
                                        ->select('ID')
                                        ->addSelect('count(*) as data')
                                        ->groupBy('ID_CATEGORY')
                                        ->createCommand(),
                                    'labelAttribute' => 'NAME'
                                ]
                            ]
                        ]);
                        ?>
                    </div>
                    <div class="d-flex flex-row justify-content-end">
                        <span class="mr-2">
                            <i class="fas fa-square text-primary"></i> This Week
                        </span>
                        <span>
                            <i class="fas fa-square text-gray"></i> Last Week
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header border-0">
                    <h3 class="card-title">Products</h3>
                    <div class="card-tools">
                        <a href="#" class="btn btn-tool btn-sm">
                            <i class="fas fa-download"></i>
                        </a>
                        <a href="#" class="btn btn-tool btn-sm">
                            <i class="fas fa-bars"></i>
                        </a>
                    </div>
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-striped table-valign-middle">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Sales</th>
                                <th>More</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <img src="../images/150.png" alt="Product 1" class="img-circle img-size-32 mr-2">
                                    Some Product
                                </td>
                                <td>$13 USD</td>
                                <td>
                                    <small class="text-success mr-1">
                                        <i class="fas fa-arrow-up"></i>
                                        12%
                                    </small>
                                    12,000 Sold
                                </td>
                                <td>
                                    <a href="#" class="text-muted">
                                        <i class="fas fa-search"></i>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <img src="../images/150.png" alt="Product 1" class="img-circle img-size-32 mr-2">
                                    Another Product
                                </td>
                                <td>$29 USD</td>
                                <td>
                                    <small class="text-warning mr-1">
                                        <i class="fas fa-arrow-down"></i>
                                        0.5%
                                    </small>
                                    123,234 Sold
                                </td>
                                <td>
                                    <a href="#" class="text-muted">
                                        <i class="fas fa-search"></i>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <img src="../images/150.png" alt="Product 1" class="img-circle img-size-32 mr-2">
                                    Amazing Product
                                </td>
                                <td>$1,230 USD</td>
                                <td>
                                    <small class="text-danger mr-1">
                                        <i class="fas fa-arrow-down"></i>
                                        3%
                                    </small>
                                    198 Sold
                                </td>
                                <td>
                                    <a href="#" class="text-muted">
                                        <i class="fas fa-search"></i>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <img src="../images/150.png" alt="Product 1" class="img-circle img-size-32 mr-2">
                                    Perfect Item
                                    <span class="badge bg-danger">NEW</span>
                                </td>
                                <td>$199 USD</td>
                                <td>
                                    <small class="text-success mr-1">
                                        <i class="fas fa-arrow-up"></i>
                                        63%
                                    </small>
                                    87 Sold
                                </td>
                                <td>
                                    <a href="#" class="text-muted">
                                        <i class="fas fa-search"></i>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>