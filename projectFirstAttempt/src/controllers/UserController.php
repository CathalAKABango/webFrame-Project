<?php
/**
 * class for the functions a user can do
 */

namespace Itb\Controller;

use Itb\model\attendence;
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
        $isLoggedIn = UserController::canFindMatchingUsernameAndPassword($username, $password);

        $argsArray = ['user' => $username];

        if ($isLoggedIn) {
            if ($username == "admin") {
                $students = student::getAll();
                $attendences = attendence::getAll();

                $argsArray = [
                    'students' => $students,
                    'attendendee' => $attendences,
                ];
                $templateName = 'admin';
                return $app['twig']->render($templateName . '.html.twig', $argsArray);
            }
            $students = student::getOneByUsername($username);


            $attendee = new attendence();
            $attendee->setUsername($username);

            $insertSuccess = attendence::insert($attendee);

            $attendences = attendence::searchByColumn('username', $username);
            $argsArray = [
                'students' => $students,
                'user' => $username,
                'attendendee' => $attendences,
            ];


            $templateName = 'studentPersonalPage';
            return $app['twig']->render($templateName . '.html.twig', $argsArray);
        } else {
            //            $message = 'bad username or password, please try again';
//            $argsArray = [
//                'message' => $message
//            ];
//            $templateName = 'members';
//            return $app['twig']->render($templateName . '.html.twig', $argsArray);
            return $app->redirect('/members');
        }
    }
    /**
     * function to find the username and password
     * @param $username
     * @param $password
     * @return bool
     */
    public static function canFindMatchingUsernameAndPassword($username, $password)
    {
        $user = Student::getOneByUsername($username);

        // if no record has this username, return FALSE
        if (null == $user) {
            return false;
        }

        // hashed correct password
        $hashedStoredPassword = $user->getPassword();

        return password_verify($password, $hashedStoredPassword);
    }

    /**
     * function to logout
     * @param Request $request
     * @param Application $app
     * @return mixed
     */
    public function logoutAction(Request $request, Application $app)
    {
        // remove 'user' element from SESSION array
//        unset($_SESSION['user']);
//        unset($_SESSION['role']);

        $argsArray = [
//            'user' => ''
        ];

        $templateName = 'index';
        return $app['twig']->render($templateName . '.html.twig', $argsArray);


        // redirect to index action
    }
}
