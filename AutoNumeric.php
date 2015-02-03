<?php
/**
 * @copyright Maxim Perfilev, 2015
 * @package yii2-autonumeric
 * @version 1.0.0
 */

namespace autonumeric;
use yii\helpers\Html;
use Yii;
use yii\helpers\Json;

/**
 * Class AutoNumeric
 * @package autonumeric
 * @author Maxim Perfilev <extead@gmail.com>
 * @since 1.0.0
 */
class AutoNumeric extends \yii\widgets\InputWidget {
    /**
     * @var string
     */
    protected $_pluginName = 'autoNumeric';

    /**
     * @var array
     */
    private $_inputOptions = [];

    /**
     * @var array
     */
    public $pluginOptions = [];

    /**
     * @throws \yii\base\InvalidConfigException
     */
    public function init()
    {
        parent::init();
        $this->initPluginOptions();
        $this->_inputOptions = $this->options;
        $this->_inputOptions['id'] .= '-disp';
        if (isset($this->_inputOptions['name'])) {
            unset($this->_inputOptions['name']);
        }
        $this->registerAssets();
        $this->renderInput();
    }

    /**
     *
     */
    protected function renderInput()
    {
        $name = $this->_inputOptions['id'];
        Html::addCssClass($this->_inputOptions, 'form-control');
        $input = Html::textInput($name, $this->value, $this->_inputOptions);
        $input .= $this->hasModel() ?
            Html::activeHiddenInput($this->model, $this->attribute, $this->options) :
            Html::hiddenInput($this->name, $this->value, $this->options);
        echo $input;
    }

    /**
     * @param $paramFrom
     * @param $paramTo
     */
    protected function setDefaultFormat($paramFrom, $paramTo)
    {
        $formatter = Yii::$app->formatter;
        if (empty($this->pluginOptions[$paramTo]) && !empty($formatter->$paramFrom)) {
            $this->pluginOptions[$paramTo] = $formatter->$paramFrom;
        }
    }

    /**
     *
     */
    protected function initPluginOptions()
    {
        if (!empty(Yii::$app->params['autoNumericOptions'])) {
            $this->pluginOptions += Yii::$app->params['autoNumericOptions'];
        } else {
            $this->setDefaultFormat('decimalSeparator', 'aDec');
            $this->setDefaultFormat('thousandSeparator', 'aSep');
        }
    }

    /**
     *
     */
    public function registerAssets()
    {
        $view = $this->getView();
        AutoNumericAsset::register($view);

        $id = 'jQuery("#' . $this->_inputOptions['id'] . '")';
        $idSave = 'jQuery("#' . $this->options['id'] . '")';
        $plugin = $this->_pluginName;
        $pluginOptions = Json::encode($this->pluginOptions);
        $js = <<< JS
var val = parseFloat({$idSave}.val());
{$id}.{$plugin}('init', {$pluginOptions});
{$id}.on('change', function () {
     var numDecimal = {$id}.{$plugin}('get');
    {$idSave}.val(numDecimal);
    {$idSave}.trigger('change');
});
JS;
        $view->registerJs($js);
    }
}