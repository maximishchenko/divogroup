<?php

Yii::setAlias('@webroot', __DIR__ . '/frontend/web');
Yii::setAlias('@web', '/');

return [
    'jsCompressor' => 'gulp compress-js --gulpfile gulpfile.js --src {from} --dist {to}',
    'cssCompressor' => 'gulp compress-css --gulpfile gulpfile.js --src {from} --dist {to}',
    'deleteSource' => false,
    'bundles' => [
        'frontend\assets\AppAsset'
    ],
    'targets' => [
        'all' => [
            'class' => 'frontend\assets\AppAsset',
            'basePath' => '@webroot/',
            'baseUrl' => '@web/',
            // 'jsOptions' => [
            //     'async' => 'async',
            // ],
            'js' => 'assets/all-{hash}.min.js',
            'css' => 'assets/all-{hash}.min.css',
            'depends' => [
            ],
        ],
    ],
    // Asset manager configuration:
    'assetManager' => [
        'basePath' => '@webroot/assets',
        'baseUrl' => '@web/assets',
        'linkAssets' => true
    ],
];