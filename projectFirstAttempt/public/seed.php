<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Itb\Controller\UserController;

define('DB_HOST', 'localhost');
define('DB_USER', 'fred');
define('DB_PASS', 'smith');
define('DB_NAME', 'martialarts');

$cathal = new \Itb\model\Student();
$cathal->setUsername('cathal');
$cathal->setPassword('qwerty');


$joe = new \Itb\model\Student();
$joe->setUsername('joe');
$joe->setPassword('bloggs');



\Itb\Controller\UserController::insert($matt);

\Itb\Controllers\UserController::insert($joe);


$users = \UserController::getAll();

var_dump($users);
