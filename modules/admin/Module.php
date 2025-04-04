<?php

namespace app\modules\admin;

// use app\commands\Helpers;

/**
 * admin module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'app\modules\admin\controllers';

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }
    // public function behaviors()
    // {
    //     return array_merge(
    //         parent::behaviors(),
    //         Helpers::accessControl()
    //     );
    // }
}
