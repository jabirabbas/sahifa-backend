<?php

namespace api\modules\v1\controllers;

use yii\rest\ActiveController;
use yii\helpers\ArrayHelper;
/**
* Verse Controller API
*
* @author Jabir Charaniya <jabirbbs@gmail.com>
*/
class VerseController extends ActiveController
{
	public $modelClass = 'api\modules\v1\models\Verse';

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
		if(!empty(\Yii::$app->request->queryParams)){
			$chapter = \api\modules\v1\models\Chapter::findOne(\Yii::$app->request->queryParams['chapter_id']);
			$chapter = ArrayHelper::toArray($chapter);

			$query = \api\modules\v1\models\Verse::find()->where(\Yii::$app->request->queryParams)->all();
		    $verses = ArrayHelper::toArray($query);
		    foreach($verses as $key => $verse){
		    	$query = \api\modules\v1\models\Words::find()->where(['verse_id'=>$verse['id']])->all();
		    	$verses[$key]['words'] = ArrayHelper::toArray($query);
		    }

		    $chapter['verses'] = $verses;
		}
		return $chapter;
	}
}