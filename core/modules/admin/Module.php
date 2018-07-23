<?php

namespace app\modules\admin;

/**
 * admin module definition class
 */
class Module extends \yii\base\Module
{
//    public $defaultRoute = '/admin/admin/index';
    /**
     * @inheritdoc'
     */
    public $controllerNamespace = 'app\modules\admin\controllers';
    public $layout = 'main';

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }
}
