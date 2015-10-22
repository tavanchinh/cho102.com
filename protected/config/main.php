<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
    'timeZone' => 'Asia/Ho_Chi_Minh',
    'basePath' => dirname(__file__) . DIRECTORY_SEPARATOR . '..',
    'name' => 'Trang thông tin rao vặt',

    // preloading 'log' component
    'preload' => array('log'),

    // autoloading model and component classes
    'import' => array(
        'application.models.*',
        'application.models.base.*',
        'application.components.*'),

    'modules' => array(

        // uncomment the following to enable the Gii tool

        'gii' => array(
            'class' => 'system.gii.GiiModule',
            'password' => 'chinhdaica',
            // If removed, Gii defaults to localhost only. Edit carefully to taste.
            'ipFilters' => array('127.0.0.1', '::1')),
        'admin',

        ),

    // application components
    'components' => array(
        'user' => array( // enable cookie-based authentication
                'allowAutoLogin' => true),

        // uncomment the following to enable URLs in path-format

        'urlManager' => array('urlFormat' => 'path', 'rules' => array(
                
                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
                '/chuyen-muc/<title:.*?>-c<cat_id:\d+>' => '/news/index',
                '/tin-tuc/<title:.*?>-<id:\d+>.html' => '/news/detail',
                '/tin-tuc/<title:.*?>-<id:\d+>.html' => '/news/detail',
                '/san-pham/<title:.*?>-<id:\d+>.html' => '/product/detail',
                '/profile' => '/user/info',
                '/post' => '/product/create',
                )),

        'db' => require (dirname(__file__) . '/database.php'),
        'errorHandler' => array( // use 'site/error' action to display errors
                'errorAction' => 'site/error'),
        'log' => array('class' => 'CLogRouter', 'routes' => array(array('class' =>
                        'CFileLogRoute', 'levels' => 'error, warning'))),

        'cache' => array('class' => 'system.caching.CFileCache', ),
        ) // uncomment the following to show log messages on web pages
        /*
    * array(
    * 'class'=>'CWebLogRoute',
    * ),
    */

    ,

    // application-level parameters that can be accessed
    // using Yii::app()->params['paramName']
    'params' => array( // this is used in contact page
            'adminEmail' => 'webmaster@example.com'));
