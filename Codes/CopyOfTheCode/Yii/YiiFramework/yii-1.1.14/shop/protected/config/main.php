<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'My Web Application',

	//设置系统默认控制器；
	'defaultController'=>'index',
	// preloading 'log' component
	'preload'=>array('log'),

	//'theme'=>'summer',

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool

		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'2015',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),
		'backend09',

	),

	// application components
	'components'=>array(
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
			'loginUrl'=>'./index.php?r=user/login',
		),
		'cache'=>array(
			'class'=>'system.caching.CFileCache',
		),
		// uncomment the following to enable URLs in path-format
/*
		'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>array(
				'user/login'=>array('user/login','urlSuffix'=>'.html'),
				'user/register'=>array('user/register','urlSuffix'=>'.htm'),

				//goods/20   ====>  goods/detail&id=20
                        'goods/<id:\d+>' => 'goods/detail',

				//goods/4-2-3-5.html  ===> goods/category&brand=4&price2&color=3&screen=5
				//'goods/<brand:\d+>-<price:\d+>-<color:\d+>-<screen:\d+>'=>array('goods/category','urlSuffix'=>'.html'),


				//'goods/<id:\d+>/<name:[a-z]+>'=>'goods/category',
//				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
//				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
//				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),

*/
//		'db'=>array(
//			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
//		),
		// uncomment the following to use a MySQL database

		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=php0905',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => '123456',
			'charset' => 'utf8',

           // 显示每个sql语句与运行的时间�
            'enableProfiling'=>true,

			'tablePrefix'=>'sw_',
			'enableParamLogging'=>true,
		),

		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages

				array(
					'class'=>'CWebLogRoute',
				),

			),
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'webmaster@example.com',
	),
);