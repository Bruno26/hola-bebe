<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name' => 'Protocolización',
    'defaultController' => 'vivienda', 
    // preloading 'log' component
    'preload' => array(
        'log',
        'booster',
    ),
    // autoloading model and component classes
    'import' => array(
        'application.models.*',
        'application.components.*',
        'application.modules.cruge.components.*',
        'application.modules.cruge.extensions.crugemailer.*',
    ),
    'modules' => array(
        'cruge' => array(
            'tableprefix' => 'cruge_',
//            // para que utilice a protected.modules.cruge.models.auth.CrugeAuthDefault.php
//            //
//            // en vez de 'default' pon 'authdemo' para que utilice el demo de autenticacion alterna
//            // para saber mas lee documentacion de la clase modules/cruge/models/auth/AlternateAuthDemo.php
//            //
            'availableAuthMethods' => array('default'),
            'availableAuthModes' => array('username', 'email'),
            // url base para los links de activacion de cuenta de usuario
            'baseUrl' => 'http://coco.com/',
            // NO OLVIDES PONER EN FALSE TRAS INSTALAR
            'debug' => FALSE,
            'rbacSetupEnabled' => true,
            'allowUserAlways' => false,
            // MIENTRAS INSTALAS..PONLO EN: false
            // lee mas abajo respecto a 'Encriptando las claves'
            //
            'useEncryptedPassword' => false,
//            // Algoritmo de la función hash que deseas usar
//            // Los valores admitidos están en: http://www.php.net/manual/en/function.hash-algos.php
            'hash' => 'md5',
//            // Estos tres atributos controlan la redirección del usuario. Solo serán son usados si no
//            // hay un filtro de sesion definido (el componente MiSesionCruge), es mejor usar un filtro.
//            //  lee en la wiki acerca de:
//            //   "CONTROL AVANZADO DE SESIONES Y EVENTOS DE AUTENTICACION Y SESION"
//            //
//            // ejemplo:
//            //		'afterLoginUrl'=>array('/site/welcome'),  ( !!! no olvidar el slash inicial / )
//            //		'afterLogoutUrl'=>array('/site/page','view'=>'about'),
//            //
            'afterLoginUrl' => null,
            'afterLogoutUrl' => null,
            'afterSessionExpiredUrl' => array('/cruge/ui/login'),
//            // manejo del layout con cruge.
//            //
            'loginLayout' => '//layouts/column2',
            'registrationLayout' => '//layouts/column2',
            'activateAccountLayout' => '//layouts/column2',
            'editProfileLayout' => '//layouts/column2',
//            // en la siguiente puedes especificar el valor "ui" o "column2" para que use el layout
//            // de fabrica, es basico pero funcional.  si pones otro valor considera que cruge
//            // requerirá de un portlet para desplegar un menu con las opciones de administrador.
//            //
            'generalUserManagementLayout' => 'ui',
//            // permite indicar un array con los nombres de campos personalizados, 
//            // incluyendo username y/o email para personalizar la respuesta de una consulta a: 
//            // $usuario->getUserDescription(); 
            'userDescriptionFieldsArray' => array('email'),
        ),
        // uncomment the following to enable the Gii tool
        'gii' => array(
            'generatorPaths' => array(
                'booster.gii'
            ),
            'class' => 'system.gii.GiiModule',
            'password' => '12345',
            // If removed, Gii defaults to localhost only. Edit carefully to taste.
            'ipFilters' => array('127.0.0.1', '::1'),
        ),
    ),
    // application components
    'components' => array(
        'user' => array(
            'allowAutoLogin' => true,
            'class' => 'application.modules.cruge.components.CrugeWebUser',
            'loginUrl' => array('/cruge/ui/login'),
        ),
        'authManager' => array(
            'class' => 'application.modules.cruge.components.CrugeAuthManager',
        ),
        'crugemailer' => array(
            'class' => 'application.modules.cruge.components.CrugeMailer',
            'mailfrom' => 'email-desde-donde-quieres-enviar-los-mensajes@xxxx.com',
            'subjectprefix' => 'Tu Encabezado del asunto - ',
            'debug' => true,
        ),
        // 
        // uncomment the following to enable URLs in path-format
        'urlManager' => array(
            'urlFormat' => 'path',
            'showScriptName' => false,
            'caseSensitive' => true,
        ),
        // database settings are configured in database.php
//        'db' => require(dirname(__FILE__) . '/database.php'),
        'errorHandler' => array(
            // use 'site/error' action to display errors
            'errorAction' => 'site/error',
        ),
        'db' => array(
            'connectionString' => 'pgsql:host=xxx.xxx.x.xxx;dbname=xxxxxxxxxxxxxxx', //cambiar host
            'emulatePrepare' => false,
            'username' => 'xxxxxxxx',
            'password' => 'xxxxxxxx',
        ),
        'dbOarcle' => array(
            'class' => 'application.extensions.PHPPDO.CPdoDbConnection',
            'pdoClass' => 'PHPPDO',
            'connectionString' => 'oci:dbname=//xxx.xxx.x.xxx/xxxxx',
            'username' => 'xxxxxxxxxxxxxxx',
            'password' => 'xxxxxxxxxxxxxxx',
        ),
        'db3' => array(
            'connectionString' => 'pgsql:host=xxx.xxx.x.xxx;dbname=xxxxxxxxx', //cambiar host
            'class' => 'CDbConnection',
            'emulatePrepare' => false,
            'username' => 'xxxxxxxx',
            'password' => 'xxxxxxxx',
            'charset' => 'utf8',
        ),
        'booster' => array(
            'class' => 'ext.booster.components.Booster',
            'responsiveCss' => true,
        ),
        'log' => array(
            'class' => 'CLogRouter',
            'routes' => array(
                array(
                    'class' => 'CFileLogRoute',
                    'levels' => 'error, warning',
                ),
            // uncomment the following to show log messages on web pages
            /*
              array(
              'class'=>'CWebLogRoute',
              ),
             */
            ),
        ),
    ),
    // application-level parameters that can be accessed
    // using Yii::app()->params['paramName']
    'params' => array(
        // this is used in contact page
        'adminEmail' => 'webmaster@example.com',
    ),
);
