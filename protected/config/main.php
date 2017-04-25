<?php
// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name' => 'LineCRM Yii-version.',
    'language' => substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2),
    'sourceLanguage' => 'en-US',
    'preload' => array('log'),
    'import' => array(
        'application.models.*',
        'application.components.*',
    ),
    'modules' => array(
        // uncomment the following to enable the Gii tool
        'gii' => array(
            'class' => 'system.gii.GiiModule',
            'password' => 'pass_to_linecrm',
            // If removed, Gii defaults to localhost only. Edit carefully to taste.
            'ipFilters' => array('127.0.0.1'),
        ),
    ),
    // application components
    'components' => array(
        'user' => array(
            // enable cookie-based authentication
            'allowAutoLogin' => true,
        ),
        // uncomment the following to enable URLs in path-format
        /*
          'urlManager'=>array(
          'urlFormat'=>'path',
          'rules'=>array(
          '<controller:\w+>/<id:\d+>'=>'<controller>/view',
          '<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
          '<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
          ),
          ),
         */

        // database settings are configured in database.php
        'db' => array(
            /*
              'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
             */
            // uncomment the following lines to use a MySQL database
            'connectionString' => 'mysql:host=localhost;dbname=linecrm',
            'class' => 'system.db.CDbConnection',
            /* SQL statements that should be executed right after the DB
              connection is established. */
            'initSQLs' => array("set time_zone='+02:00';"),
            'schemaCachingDuration' => 3600,
            'emulatePrepare' => true,
            'username' => 'linecrm',
            'password' => 'pass_to_linecrm',
            'tablePrefix' => 'crm_',
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
        // this is used in contact page
        'adminEmail' => 'admin@example.com',
        'powered_by' => 'tvitcom',
    ),
);
