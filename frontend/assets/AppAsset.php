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
        'css/main.css',
    ];
    public $js = [
        'js/app.js',
        "js/main.js"
    ];
    public $jsOptions = [
        'defer' => true,
        'position' => \yii\web\View::POS_HEAD
    ];
    public $depends = [
        'yii\web\YiiAsset',
    ];
}