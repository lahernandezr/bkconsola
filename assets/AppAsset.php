<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
        'css/burgerking.css',
        // 'css/fonts.css',
    ];

    public $js = [
        
        'https://cdn.datatables.net/buttons/1.2.4/js/buttons.print.min.js',
        'https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js',
        'https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js',
        'https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js',
        'https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js',
        'https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js',
        'https://cdnjs.cloudflare.com/ajax/libs/jspdf/0.9.0rc1/jspdf.min.js',
        'https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js',
        'https://cdn.datatables.net/select/1.3.3/js/dataTables.select.min.js',
        // 'js/main.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap4\BootstrapAsset',
        'rmrevin\yii\fontawesome\CdnProAssetBundle',
        'fedemotta\datatables\DataTablesAsset',
    ];
}
