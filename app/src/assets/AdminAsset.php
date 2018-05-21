<?php

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Class AdminAssets
 *
 * @package app\assets
 */
class AdminAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/admin/site.css',
        'css/admin/material-dashboard.css',
    ];
    public $js = [
    ];
    public $depends = [
        'yii\jquery\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
