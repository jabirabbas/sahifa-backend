<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css?v=0.1',
        'css/checkbox.css',
        'css/custom_checkbox.css',
        'css/style.css',
        'css/custom.css?v=0.1',
        'css/custom_select.css',
        'css/dropdown.css',
        'css/dropzone.css',
        'css/jquery.step-maker.css',
        'css/ie10-viewport-bug-workaround.css',
        'css/custom-style.css',
        'css/left-nav.css',
        'css/bootstrap-datetimepicker.min.css'
    ];
    public $js = [
        'js/custom.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        'yii\bootstrap\BootstrapPluginAsset',
    ];
}
