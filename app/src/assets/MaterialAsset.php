<?php

namespace app\assets;

/**
 * Class MaterialAsset
 *
 * @package app\assets
 */
class MaterialAsset extends \ramosisw\CImaterial\web\MaterialAsset
{
    public $depends = [
        'yii\jquery\YiiAsset',
        'yii\jquery\JqueryAsset',
        'yii\bootstrap\BootstrapAsset',
        'yii\bootstrap\BootstrapPluginAsset',
    ];
}
