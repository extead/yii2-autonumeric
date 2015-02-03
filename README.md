AutoNumeric plugin
==================
Extension for format inputs based on autoNumerical plugin [https://github.com/BobKnothe/autoNumeric](https://github.com/BobKnothe/autoNumeric)

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist extead/yii2-autonumeric "*"
```

or add

```
"extead/yii2-autonumeric": "*"
```

to the require section of your `composer.json` file.


Usage
-----

For all pluginOptions parameters see autoNumeric docs - [https://github.com/BobKnothe/autoNumeric](https://github.com/BobKnothe/autoNumeric).

Once the extension is installed, simply use it in your code by  :

```php
<?=$form->field($model, 'price_min')->widget(\extead\autonumeric\AutoNumeric::classname(), [
                'pluginOptions' => [
                    'aSep' => ' ',
                    'mDec' => 0
                ]
            ]);?>
```

