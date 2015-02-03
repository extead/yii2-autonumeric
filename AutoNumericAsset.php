<?php

/**
 * @copyright Maxim Perfilev, 2015
 * @package yii2-autonumeric
 * @version 1.2.0
 */

namespace autonumeric;
use yii\web\AssetBundle;

/**
 * Asset bundle for the [[AutoNumerical]] widget. Includes client assets from
 * [autoNumeric](https://github.com/BobKnothe/autoNumeric).
 *
 * @author Maxim Perfilev <extead@gmail.com>
 * @since 1.0
 */
class AutoNumericAsset extends AssetBundle
{
    public $depends = [
        'yii\web\JqueryAsset',
        'yii\web\YiiAsset',
    ];

    public $js = [
        'js/autoNumeric.js'
    ];

    public $sourcePath = '@autonumeric/assets';


}