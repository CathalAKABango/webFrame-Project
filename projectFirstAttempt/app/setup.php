<?php
// autoloader
// ------------
require_once __DIR__ . '/../vendor/autoload.php';
//----- autoload any classes we are using ------
require_once __DIR__ . '/config_db.php';

//------- load in main controller functions -------
require_once __DIR__ . '/../src/mainController.php';
require_once __DIR__ . '/../src/userController.php';
// my settings
// ------------
$myTemplatesPath = __DIR__ . '/../templates';

// setup Twig
// ------------
$loader = new Twig_Loader_Filesystem($myTemplatesPath);
$twig = new Twig_Environment($loader);

// setup Silex
// ------------
$app = new Silex\Application();

// register Session provider with Silex
// -------------------------
$app->register(new Silex\Provider\SessionServiceProvider());


// register Twig with Silex
// ------------
$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => $myTemplatesPath
));
