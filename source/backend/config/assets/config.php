<?php

/**
 * Configuration file for the "yii asset" console command.
 */
Yii::setAlias('@webroot', __DIR__ . '/../../web');
Yii::setAlias('@web', __DIR__ . '/../../../');

return [
    // Adjust command/callback for JavaScript files compressing:
    'jsCompressor' => 'java -jar bin/compiler.jar --js {from} --js_output_file {to}',
    // Adjust command/callback for CSS files compressing:
    'cssCompressor' => 'java -jar bin/yuicompressor.jar --type css {from} -o {to}',
    // The list of asset bundles to compress:
    'bundles' => [
        'backend\assets\AppAsset',
    ],
    // Asset bundle for compression output:
    'targets' => [
        'mainly' => [
            'class' => 'yii\web\AssetBundle',
            'basePath' => '@webroot/assets',
            'baseUrl' => '@web/assets',
            'js' => 'all-{hash}.js',
            'css' => 'all-{hash}.css',
        ],
    ],
    // Asset manager configuration:
    'assetManager' => [
        'basePath' => '@webroot/assets',
        'baseUrl' => '@web/assets',
    ],
];
