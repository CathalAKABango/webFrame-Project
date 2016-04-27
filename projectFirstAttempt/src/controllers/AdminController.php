<?php
/**
 * Created by PhpStorm.
 * User: cathal
 * Date: 01/04/2016
 * Time: 09:22
 */

namespace Itb\Controller;

use Itb\Model\Student;
use Silex\Application;
use Symfony\Component\HttpFoundation\Request;


class AdminController
{


    public function deleteUserAction(Request $request, Application $app, $id)
    {

        $student = Student::delete($id);

        $argsArray = [
            'message' => 'sorry, no book could be found with isbn = ' . $id
        ];
        $templateName = '404';


        if (null != $student){
            return $app->redirect('/admin');
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
        $username =$request->get('username');
        $password =$request->get('password');

        $lastGrade =$request->get('lastGrade');
        $dateJoined =$request->get('dateJoined');
        $currentGrade =$request->get('currentGrade');


        $student= new Student();
        $student->setUsername($username);
        $student->setLastGrade($lastGrade);
        $student->setDateJoined($dateJoined);
        $student->setCurrentGrade($currentGrade);
        $student->setPassword($password);
        $insertSuccess = Student::insert($student);

        if($insertSuccess){
            return $app->redirect('/admin');
        } else {
            //$message = 'error - not able to CREATE item ';
            //$message .= '<pre>';
            // capture print_r output as a string
            // $message .= print_r($student, true);
            $templateName = 'members';
            return $app['twig']->render($templateName . '.html.twig', []);

        }
    }
    public function updateUserFormAction(Request $request, Application $app, $id)
    {

            $student = Student::getOneById($id);



                $argsArray = [
                'student' => $student,
            ];

            $templateName = 'updateform';
            return $app['twig']->render($templateName . '.html.twig', $argsArray);



    }

    public function updateStudentAction(Request $request, Application $app, $id)
    {
        $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
        $lastGrade = filter_input(INPUT_POST, 'lastGrade', FILTER_SANITIZE_STRING);
        $dateJoined = filter_input(INPUT_POST, 'dateJoined', FILTER_SANITIZE_STRING);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
        $currentGrade = filter_input(INPUT_POST, 'currentGrade', FILTER_SANITIZE_STRING);

        $student= student::getOneById($id);

        $student->setUsername($username);
        $student->setLastGrade($lastGrade);
        $student->setDateJoined($dateJoined);
        $student->setCurrentGrade($currentGrade);
        $student->setPassword($password);
        $updateSuccess = Student::update($student);

        if($updateSuccess){
           return $app->redirect('/admin');
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