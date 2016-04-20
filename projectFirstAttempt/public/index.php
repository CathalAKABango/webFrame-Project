<?php
use Itb\MainController;
use Itb\UserController;

// do out basic setup
// ------------
require_once __DIR__ . '/../app/setup.php';

// use our static controller() method...
$app->get('/',      \Itb\Utility::controller('Itb', 'main/index'));
$app->get('/index',      \Itb\Utility::controller('Itb', 'main/index'));
$app->get('/members', \Itb\Utility::controller('Itb', 'main/members'));
$app->get('/classes', \Itb\Utility::controller('Itb', 'main/classes'));
$app->get('/admin', \Itb\Utility::controller('Itb', 'main/admin'));

$app->get('/addUser', \Itb\Utility::controller('Itb', 'admin/addUser'));
$app->get('/updateUser', \Itb\Utility::controller('Itb', 'admin/updateUser'));
$app->post('/deleteUser/{id}', \Itb\Utility::controller('Itb', 'admin/deleteUser'));
$app->post('/createNewModule', \Itb\Utility::controller('Itb', 'admin/createNewStudent'));


$app->post('/login', \Itb\Utility::controller('Itb', 'user/processLogin'));
$app->get('/processLogin', \Itb\Utility::controller('Itb', 'user/loginSuccess'));

$app['debug'] =true;
$app->run();
