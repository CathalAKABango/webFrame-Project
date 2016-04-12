<?php
use Itb\MainController;
use Itb\UserController;

// do out basic setup
// ------------
require_once __DIR__ . '/../app/setup.php';

//$mainController = new MainController();
//
//$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
//
//if ('index' == $action){
//    $mainController->indexAction($twig);
//} else if ('members' == $action) {
//    $mainController->membersAction($twig);
//} else if ('list' == $action) {
//    $mainController->listAction($twig);
//} else if ('sitemap' == $action) {
//    $mainController->sitemapAction($twig);
//} else {
//    // default is home page ('index' action)
//    $mainController->indexAction($twig);
//}


// use our static controller() method...
$app->get('/',      \Itb\Utility::controller('Itb', 'main/index'));
$app->get('/index',      \Itb\Utility::controller('Itb', 'main/index'));
$app->get('/members', \Itb\Utility::controller('Itb', 'main/members'));
$app->get('/classes', \Itb\Utility::controller('Itb', 'main/classes'));
$app->get('/list', \Itb\Utility::controller('Itb', 'main/list'));
$app->post('/login', \Itb\Utility::controller('Itb', 'user/processLogin'));
$app->get('/processLogin', \Itb\Utility::controller('Itb', 'user/loginSuccess'));


//// 404 - Page not found
//$app->error(function (\Exception $e, $code) use ($app) {
//    switch ($code) {
//        case 404:
//            $message = 'The requested page could not be found.';
//            return \Itb\MainController::error404($app, $message);
//
//        default:
//            $message = 'We are sorry, but something went terribly wrong.';
//            return \Itb\MainController::error404($app, $message);
//    }
//});
//
//// run Silex front controller
//// ------------
$app->run();
