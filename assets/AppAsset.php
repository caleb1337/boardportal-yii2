<?php
/**
 * @link https://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license https://www.yiiframework.com/license/
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
        'css/animate-3.7.0.css',
        'css/bootstrap-4.1.3.min.css',
        'css/font-awesome-4.7.0.min.css',
        'css/ion.rangeSlider.css',
        'css/ion.rangeSlider.skinFlat.css',
        'css/owl-carousel.min.css',
        'css/style.css',
        'fonts/flat-icon/flaticon.css',
    ];
    public $js = [
//        'js/vendor/bootstrap-4.1.3.min.js',
        'js/vendor/gmaps.min.js',
        'js/vendor/ion.rangeSlider.js',
//        'js/vendor/jquery-2.2.4.min.js',
        'js/vendor/owl-carousel.min.js',
        'js/vendor/wow.min.js',
//        'js/main.js',
    ];

    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap5\BootstrapAsset'
    ];
}
