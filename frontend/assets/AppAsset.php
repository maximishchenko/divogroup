<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/vendor.css',
        'css/graph-modal.min.css',
        'css/main.css',
    ];
    public $js = [
        // 'jquery-3.6.4.min.js',
        'js/graph-modal.min.js',
        "js/main.js",
        'js/app.js',
    ];
    public $jsOptions = [
        'defer' => true,
        'position' => \yii\web\View::POS_HEAD
    ];
    public $depends = [
        // 'yii\web\YiiAsset',
    ];
}