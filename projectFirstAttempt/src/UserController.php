<?php
/**
 * Created by PhpStorm.
 * User: cathal
 * Date: 01/04/2016
 * Time: 09:20
 */

namespace Itb;

use Mattsmithdev\PdoCrud\DatabaseManager;
use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

class UserController extends DatabaseManager
{

    private $id;

    public function getTitle()
    {
        return $this->username;
    }
    public function getVoteAverage()
    {
        return $this->password;
    }
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }


    public function setPassword($password)
    {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $this->password = $hashedPassword;
    }


    /**
     * return success (or not) of attempting to find matching username/password in the repo
     * @param $username
     * @param $password
     *
     * @return bool
     */
    public static function canFindMatchingUsernameAndPassword($username, $password, $id)
    {
        $user = UserController::getOneByUsername($username);
        $row = Student::getOneById($id);
        $password = $row->getPassword($password);
        // if no record has this username, return FALSE
        if(null == $user){
            return false;
        }

        // hashed correct password
        $hashedStoredPassword = $user->getVoteAverage();

        // return whether or not hash of input password matches stored hash
        return password_verify($password, $hashedStoredPassword);
    }

    /**
     * if record exists with $username, return User object for that record
     * otherwise return 'null'
     *
     * @param $username
     *
     * @return mixed|null
     */
//    public static function getOneByUsername($username)
//    {
//        $db = new DatabaseManager();
//        $connection = $db->getDbh();
//
//        $sql = 'SELECT * FROM student WHERE username=:username';
//        $statement = $connection->prepare($sql);
//        $statement->bindParam(':username', $username, \PDO::PARAM_STR);
//        $statement->setFetchMode(\PDO::FETCH_CLASS, __CLASS__);
//        $statement->execute();
//
//        if ($object = $statement->fetch()) {
//            return $object;
//        } else {
//            return null;
//        }
//    }
    public function getOneByUsername($username)
    {
        $db = new DatabaseManager();
        $connection = $db->getDbh();

        $statement = $connection->prepare('SELECT * from student WHERE username=:username');
        $statement->bindParam(':username', $username);
        $statement->setFetchMode(\PDO::FETCH_CLASS, '\\Itb\\Student');
        $statement->execute();

        if ($student = $statement->fetch()) {
            return $student;
        } else {
            return null;
        }
    }

//    public function processLoginAction(Request $request, Application $app)
//    {
//        // retrieve 'name' from GET params in Request object
//        $username = $request->get('username');
//        $password = $request->get('password');
//
////        // authenticate!
////        if ('user' === $username && 'user' === $password) {
////            // store username in 'user' in 'session'
////            $app['session']->set('user', array('user' => $username) );
////            //echo "<p>you are logged in as ".$username."</p>";
////
////            $templateName = 'loginSuccess';
////            $argsArray = array(
////                'username' => $username
////            );
////            // success - redirect to the secure admin home page
////            return $app['twig']->render($templateName . '.html.twig', $argsArray);
////        }
////
////        // login page with error message
////        // ------------
////        $templateName = 'members';
////        $argsArray = array(
////            'errorMessage' => 'bad username or password - please re-enter'
////        );
////
////        return $app['twig']->render($templateName . '.html.twig', $argsArray);
////    }
    public function processLoginAction(Request $request, Application $app)
    {
        // default is bad login
         $isLoggedIn = false;

        $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
        $id = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

        // search for user with username in repository
        $isLoggedIn = UserController::canFindMatchingUsernameAndPassword($username, $password, $id);

        // action depending on login success
        if($isLoggedIn){
            // success - found a matching username and password
            $templateName = 'loginSuccess';
            $argsArray = array(
                'username' => $username
            );
            // success - redirect to the secure admin home page
            return $app['twig']->render($templateName . '.html.twig', $argsArray);
        } else {
            $templateName = 'members';
            $argsArray = array(
                'errorMessage' => 'bad username or password - please re-enter'
            );

            return $app['twig']->render($templateName . '.html.twig', $argsArray);
        }
    }

    // action for route:    /login
    public function loginAction(Request $request, Application $app)
    {
        // logout any existing user
        $app['session']->set('user', null );

        // build args array
        // ------------
        $argsArray = [];

        // render (draw) template
        // ------------
        $templateName = 'members';
        return $app['twig']->render($templateName . '.html.twig', $argsArray);
    }

    // action for route:    /logout
    public function logoutAction(Request $request, Application $app)
    {
        // logout any existing user
        $app['session']->set('user', null );

        // redirect to home page
//        return $app->redirect('');

        // render (draw) template
        // ------------
        $templateName = 'index';
        return $app['twig']->render($templateName . '.html.twig', []);

    }



}