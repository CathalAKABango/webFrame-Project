<?php
/**
 * class for the functions a user can do
 */

namespace Itb\Controller;

use Itb\Model\Student;
use Mattsmithdev\PdoCrud\DatabaseManager;
use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class UserController
 * @package Itb\Controller
 */
class UserController extends DatabaseManager
{

    /**
     * function to process the request to login
     * @param Request $request
     * @param Application $app
     * @return mixed
     */
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
        if ($isLoggedIn) {
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
}
