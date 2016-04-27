<?php
/**
 * Created by PhpStorm.
 * User: cathal
 * Date: 01/04/2016
 * Time: 09:20
 */

namespace Itb\Controller;

use Itb\Model\Student;
use Mattsmithdev\PdoCrud\DatabaseManager;
use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

class UserController extends DatabaseManager
{

    public function processLoginAction(Request $request, Application $app)
    {
        // default is bad login
        $isLoggedIn = false;

        $username =$request->get('username');
        $password =$request->get('password');


        // search for user with username in repository
        $isLoggedIn = Student::canFindMatchingUsernameAndPassword($username, $password);


        $argsArray = ['user' => $username];
        // action depending on login success
        if($isLoggedIn){
            $templateName = 'loginSuccess';
            return $app['twig']->render($templateName . '.html.twig', $argsArray);
        } else {
            $message = 'bad username or password, please try again';
            $argsArray = [
                'message' => $message
            ];
            $templateName = 'members';
            return $app['twig']->render($templateName . '.html.twig', $argsArray);
        }
    }


//    public static function canFindMatchingUsernameAndPassword($username, $password)
//    {
//
//        $user = UserController::getOneByUsername($username);
//        //$row = Student::getOneBy($id);
//        $password = $user->getPassword($password);
//        // if no record has this username, return FALSE
//        if(null == $user){
//            return false;
//        }
//
//        // hashed correct password
//        $hashedStoredPassword = $user->getPassword();
//
//        // return whether or not hash of input password matches stored hash
//        return password_verify($password, $hashedStoredPassword);
//    }
//
//    public function getOneByUsername($username)
//    {
//        $db = new DatabaseManager();
//        $connection = $db->getDbh();
//
//        $statement = $connection->prepare('SELECT * from students WHERE username=:username');
//        $statement->bindParam(':username', $username);
//        $statement->setFetchMode(\PDO::FETCH_CLASS, '\\Itb\\Student');
//        $statement->execute();
//
//        if ($student = $statement->fetch()) {
//            return $student;
//        } else {
//            return null;
//        }
//    }
//
//
//    public function processLoginAction(Request $request, Application $app)
//    {
//        // default is bad login
//         $isLoggedIn = false;
//
//        $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
//        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
//
//        // search for user with username in repository
//        $isLoggedIn = UserController::canFindMatchingUsernameAndPassword($username, $password);
//
//        // action depending on login success
//        if($isLoggedIn){
//            // success - found a matching username and password
//            $templateName = 'loginSuccess';
//            $argsArray = array(
//                'username' => $username
//            );
//            // success - redirect to the secure admin home page
//            return $app['twig']->render($templateName . '.html.twig', $argsArray);
//        } else {
//            $templateName = '404';
//            $argsArray = array(
//                'errorMessage' => 'bad username or password - please re-enter'
//            );
//
//            return $app['twig']->render($templateName . '.html.twig', $argsArray);
//        }
//    }
//
//    // action for route:    /login
//    public function loginAction(Request $request, Application $app)
//    {
//        // logout any existing user
//        $app['session']->set('user', null );
//
//        // build args array
//        // ------------
//        $argsArray = [];
//
//        // render (draw) template
//        // ------------
//        $templateName = 'loginSuccess';
//        return $app['twig']->render($templateName . '.html.twig', $argsArray);
//    }
//
//    // action for route:    /logout
//    public function logoutAction(Request $request, Application $app)
//    {
//        // logout any existing user
//        $app['session']->set('user', null );
//
//        // redirect to home page
////        return $app->redirect('');
//
//        // render (draw) template
//        // ------------
//        $templateName = 'index';
//        return $app['twig']->render($templateName . '.html.twig', []);
//
//    }
//
//

}