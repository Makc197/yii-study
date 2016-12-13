<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class CustomAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'theme/vendor/bootstrap/css/bootstrap.min.css',
        'theme/vendor/metisMenu/metisMenu.min.css',
        'theme/dist/css/sb-admin-2.css',
        'theme/vendor/morrisjs/morris.css',
        'theme/vendor/font-awesome/css/font-awesome.min.css',
    ];
    public $js = [
        'theme/vendor/jquery/jquery.min.js',
        'theme/vendor/bootstrap/js/bootstrap.min.js',
        'theme/vendor/metisMenu/metisMenu.min.js',
        'theme/vendor/raphael/raphael.min.js',
        'theme/vendor/morrisjs/morris.min.js',
        'theme/data/morris-data.js',
        'theme/dist/js/sb-admin-2.js',
    ];
    // public $depends = [
    //     'yii\web\YiiAsset',
    //     'yii\bootstrap\BootstrapAsset',
    // ];
}
