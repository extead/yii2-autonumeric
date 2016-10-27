<?php

/**
 * @copyright Maxim Perfilev, 2015
 * @package yii2-autonumeric
 * @version 1.0.0
 */

namespace extead\autonumeric;

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
	public $sourcePath = '@vendor/bower/autoNumeric';

    public $depends = [
        'yii\web\JqueryAsset',
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];

    public function init()
    {
        parent::init();
		
        $this->js = [
            YII_DEBUG ? 'autoNumeric.js' : 'autoNumeric-min.js'
        ];		
	}
	
}