<?php

namespace api\modules\v1\controllers;

use yii\rest\ActiveController;

/**
* Chapter Controller API
*
* @author Jabir Charaniya <jabirbbs@gmail.com>
*/
class ChapterController extends ActiveController
{
	public $modelClass = 'api\modules\v1\models\Chapter';

	public function behaviors(){
        $behaviors = parent::behaviors();
        $behaviors['corsFilter'] = [
            'class' => \yii\filters\Cors::className(),
            'cors' => [
                'Origin' => ['*'],
                'Access-Control-Request-Method' => ['GET'], // 'POST', 'PUT', 'PATCH', 'DELETE', 'HEAD', 'OPTIONS'],
                'Access-Control-Request-Headers' => ['*'],
            ],
        ];
        
        return $behaviors;
    }

	public function actions()
	{
	    $actions = parent::actions();

	    // disable the "delete" and "create" actions
	    unset($actions['delete'], $actions['create']);

	    // customize the data provider preparation with the "prepareDataProvider()" method
	    $actions['index']['prepareDataProvider'] = [$this, 'prepareDataProvider'];

	    return $actions;
	}

	public function prepareDataProvider()
	{
	    $query = \api\modules\v1\models\Chapter::find();
	    $dataProvider = new \yii\data\ActiveDataProvider([
	         'query' => $query,
	         'pagination' => ['pageSize' => 0]
	    ]);

	    return $dataProvider;
	}
}