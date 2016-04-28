<?php


// do out basic setup
// ------------
require_once __DIR__ . '/../app/setup.php';

// use our static controller() method...
$app->get('/', 'Itb\Controller\MainController::indexAction');
$app->get('/index', 'Itb\Controller\MainController::indexAction');
$app->get('/members', 'Itb\Controller\MainController::membersAction');
$app->get('/classes', 'Itb\Controller\MainController::classesAction');
$app->get('/admin', 'Itb\Controller\MainController::adminAction');
$app->get('/logout', 'Itb\Controller\UserController::logoutAction');


$app->get('/addUser', 'Itb\Controller\AdminController::addUserAction');

$app->post('/deleteUser/{id}', 'Itb\Controller\AdminController::deleteUserAction');
$app->post('/createNewModule', 'Itb\Controller\AdminController::createNewStudentAction');
$app->get('/updateUser/{id}', 'Itb\Controller\AdminController::updateUserFormAction');
$app->post('/updateStudent/{id}', 'Itb\Controller\AdminController::updateStudentAction');

$app->post('/login', 'Itb\Controller\UserController::processLoginAction');
$app->post('/processLogin', 'Itb\Controller\UserController::loginSuccessAction');
$app->post('/lognSuccessAction', 'Itb\Controller\UserController::registertimeLogin');

//$app->get('/processLogin', \Itb\Utility::controller('Itb', 'user/stidentP'));

$app['debug'] =true;
$app->run();
