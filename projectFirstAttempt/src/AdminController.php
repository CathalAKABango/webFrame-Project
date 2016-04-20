<?php
/**
 * Created by PhpStorm.
 * User: cathal
 * Date: 01/04/2016
 * Time: 09:22
 */

namespace Itb;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class AdminController
 *
 * simple authentication using Silex session object
 * $app['session']->set('isAuthenticated', false);
 *
 * but the propert way to do it:
 * https://gist.github.com/brtriver/1740012
 *
 * @package Hdip\Controller
 */
class AdminController
{


    public function deleteUserAction(Request $request, Application $app, $id)
    {

        $student = Student::delete($id);

        $argsArray = [
            'message' => 'sorry, no book could be found with isbn = ' . $id
        ];
        $templateName = '404';

        // if book WAS found, then show it
        if (null != $student){
            $argsArray = [
                'student' => $student
            ];

            $templateName = 'registrationSuccsess';
        }

        return $app['twig']->render($templateName . '.html.twig', $argsArray);
    }
    public function addUserAction(Request $request, Application $app)
    {
        {
            $templateName = 'newStudentForm';
            return $app['twig']->render($templateName . '.html.twig', []);
        }

    }
    public function createNewStudentAction(Request $request, Application $app)
    {
        $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
        $lastgrade = filter_input(INPUT_POST, 'lastgrade', FILTER_SANITIZE_STRING);
        $date = filter_input(INPUT_POST, 'date', FILTER_SANITIZE_STRING);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
        $currentgrade = filter_input(INPUT_POST, 'currentgrade', FILTER_SANITIZE_STRING);

        $student= new Student();
        $student->setUsername($username);
        $student->setLastGrade($lastgrade);
        $student->setDateJoined($date);
        $student->setCurrentGrade($currentgrade);
        $student->setPassword($password);
        $insertSuccess = Student::insert($student);

        if($insertSuccess){
            $templateName = 'registrationSuccsess';
            return $app['twig']->render($templateName . '.html.twig', []);
        } else {
            //$message = 'error - not able to CREATE item ';
            //$message .= '<pre>';
            // capture print_r output as a string
            // $message .= print_r($student, true);
            $templateName = 'members';
            return $app['twig']->render($templateName . '.html.twig', []);

        }
    }


}