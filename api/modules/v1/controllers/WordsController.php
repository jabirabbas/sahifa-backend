<?php

namespace api\modules\v1\controllers;

use yii\rest\ActiveController;

/**
* Chapter Controller API
*
* @author Jabir Charaniya <jabirbbs@gmail.com>
*/
class WordsController extends ActiveController
{
	public $modelClass = 'api\modules\v1\models\Words';
}