<?php

$params = array_merge(
require(__DIR__ . '/../../common/config/params.php'),
require(__DIR__ . '/../../common/config/params-local.php')
);

return [
	'id' => 'app-api',
	'basePath' => dirname(__DIR__),
	'bootstrap' => ['log'],
	'modules' => [
		'v1' => [
			'class' => 'api\modules\v1\Module' // here is our v1 modules
		]
	],
	'components' => [
		'user' => [
			'identityClass' => 'common\models\User',
			'enableAutoLogin' => false,
		],
		'log' => [
			'traceLevel' => YII_DEBUG ? 3 : 0,
			'targets' => [
				[
				'class' => 'yii\log\FileTarget',
				'levels' => ['error', 'warning'],
				],
			],
		],
		'urlManager' => [
			'enablePrettyUrl' => true,
			'enableStrictParsing' => true,
			'showScriptName' => false,
			'rules' => [
				[
					'pluralize' => false,	
					'class' => 'yii\rest\UrlRule',
					'controller' => ['v1/country','v1/chapter','v1/verse','v1/words'],
					'tokens' => [
						'{id}' => '<id:\\w+>'
					]
				]
			],
		]
	],
	'params' => $params,
];