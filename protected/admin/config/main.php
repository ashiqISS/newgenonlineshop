<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.

$admin = dirname(dirname(__FILE__));
Yii::setPathOfAlias('admin', $admin);
Yii::setPathOfAlias('booster', dirname(__FILE__) . '/../extensions/yiibooster');
Yii::setPathOfAlias('eckeditor', dirname(__FILE__) . '/../extensions/eckeditor');
return array(
    'timeZone' => 'Asia/Calcutta',
    'basePath' => dirname($admin),
    'runtimePath' => $admin . '/runtime',
    'controllerPath' => $admin . '/controllers',
    'viewPath' => $admin . '/views',
    'name' => 'NewGen Shopping | Admin',
    // preloading 'log' component
    'preload' => array('log', 'booster'),
    // autoloading model and component classes
    'import' => array(
        'application.models.*',
        'admin.models.*',
        'application.components.*',
        'admin.components.*',
        'admin.controllers.*',
        'admin.views.*',
        'admin.extensions.yii-mail.*',
        'admin.modules.*',
        'admin.extensions.easyimage.EasyImage',
//        'admin.extensions.NavaJcrop.ImageJcrop',
//        'admin.extensions.jcrop.EJcrop',
    ),
    'modulePath' => $admin . '/modules/',
    'modules' => array(
        'settings', 'users', 'products', 'masters', 'payouts', 'Ad', 'transactions', 'reports',
        // uncomment the following to enable the Gii tool
        'gii' => array(
            'class' => 'system.gii.GiiModule',
            'password' => 'gii',
            // If removed, Gii defaults to localhost only. Edit carefully to taste.
            'ipFilters' => array('127.0.0.1', '::1'),
        ),
    ),
    // application components
    'components' => array(
        'Upload' => array('class' => 'UploadFile'),
        'category' => array('class' => 'selectCategory'),
        'booster' => array(
            'class' => 'booster.components.Booster',
        ),
        'user' => array(
            // enable cookie-based authentication
            'allowAutoLogin' => true,
        ),
        'clientScript' => array(
            'class' => 'CClientScript',
            'scriptMap' => array(
                'jquery.js' => '//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js',
                'jquery.min.js' => '//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js',
                'jquery-ui.js' => '//ajax.googleapis.com/ajax/libs/jqueryui/1.8.7/jquery-ui.min.js',
                'jquery-ui.min.js' => '//ajax.googleapis.com/ajax/libs/jqueryui/1.8.7/jquery-ui.min.js'
            ),
        ),
        'mail' => array(
            'class' => 'application.admin.extensions.yii-mail.YiiMail',
            'transportType' => 'smtp',
            'transportOptions' => array(
//                'host' => 'mail.ecareagora.com',
                'host' => 'mail.intersmarthosting.in',
                // 'encryption'=>'ssl', // use ssl
                'username' => "develop@intersmarthosting.in",
                'password' => "develop@123",
                'port' => '25', // ssl port for gmail
            ),
            'viewPath' => 'application.admin.template',
            'logging' => true,
            'dryRun' => false
        ),
        // uncomment the following to enable URLs in path-format
        'urlManager' => array(
            'urlFormat' => 'path',
            //'caseSensitive' => false,
            'rules' => require(dirname(__FILE__) . '/urlrules.php'),
        ),
        // database settings are configured in database.php
//        'db' => require(dirname(__FILE__) . '/database.php'),
        'db' => array(
            'connectionString' => 'mysql:host=localhost;dbname=newgen_shopping',
            'emulatePrepare' => true,
            'username' => 'root',
            'password' => 'mysql',
            'charset' => 'utf8',
        ),
        'errorHandler' => array(
            // use 'site/error' action to display errors
            'errorAction' => 'site/error',
        ),
        'log' => array(
            'class' => 'CLogRouter',
            'routes' => array(
                array(
                    'class' => 'CFileLogRoute',
                    'levels' => 'error, warning',
                ),
                // uncomment the following to show log messages on web pages
                array(
                    'class' => 'CWebLogRoute',
                ),
            ),
        ),
    ),
    // application-level parameters that can be accessed
    // using Yii::app()->params['paramName']
    'params' => array(
        // mail ids for sending mail
        'adminEmail' => 'aathira@intersmart.in', // admin mail
        'infoEmail' => 'aathira@intersmart.in',
        'contactEmail' => 'aathira@intersmart.in', // contact mail
    ),
);
