<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Itb\UserController;

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'martialarts');

$cathal = new User();
$cathal->setUsername('cathal');
$cathal->setPassword('qwerty');


$joe = new User();
$joe->setUsername('joe');
$joe->setPassword('bloggs');



\Itb\UserController::insert($matt);
\Itb\UserController::insert($joe);


$users = \Itb\UserController::getAll();

var_dump($users);
