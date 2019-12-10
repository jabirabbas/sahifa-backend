<?php

namespace app\modules\sahifa;

use Yii;
use yii\helpers\Url;
/**
 * sahifa module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'app\modules\sahifa\controllers';

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        if(empty(Yii::$app->user->identity)){
            header('Location: '.Url::base().'/index.php/site/login');
            exit;
        }
        parent::init();
    }
}
