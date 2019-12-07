<?php

namespace itshkacomua\notebook;

/**
 * notebook module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'itshkacomua\notebook\controllers';
    public $defaultRoute = 'notebook';

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }
}
