<?php
/**
 *
 * administrator cntroller
 */

namespace Itb\Controller;

use Itb\Model\Student;
use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class AdminController
 * @package Itb\Controller
 */
class AdminController
{

    /**
     * function to delete a user
     * @param Request $request
     * @param Application $app
     * @param $id
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function deleteUserAction(Request $request, Application $app, $id)
    {
        $student = Student::delete($id);

        $argsArray = [
            'message' => 'sorry, no book could be found with isbn = ' . $id
        ];
        $templateName = '404';


        if (null != $student) {
            return $app->redirect('/admin');
        }

        return $app['twig']->render($templateName . '.html.twig', $argsArray);
    }

    /**
     * function to add a user
     * @param Request $request
     * @param Application $app
     * @return mixed
     */
    public function addUserAction(Request $request, Application $app)
    {
        {
            $templateName = 'newStudentForm';
            return $app['twig']->render($templateName . '.html.twig', []);
        }
    }

    /**
     * function to create a new student
     * @param Request $request
     * @param Application $app
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
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

        if ($insertSuccess) {
            return $app->redirect('/admin');
        } else {
            $templateName = 'members';
            return $app['twig']->render($templateName . '.html.twig', []);
        }
    }

    /**
     * fuction to update the user by a form action
     * @param Request $request
     * @param Application $app
     * @param $id
     * @return mixed
     */
    public function updateUserFormAction(Request $request, Application $app, $id)
    {
        $student = Student::getOneById($id);



        $argsArray = [
                'student' => $student,
            ];

        $templateName = 'updateform';
        return $app['twig']->render($templateName . '.html.twig', $argsArray);
    }

    /**
     * function to update a student from a form action
     * @param Request $request
     * @param Application $app
     * @param $id
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function updateStudentAction(Request $request, Application $app, $id)
    {
        $username = $request->get('username');
        $lastGrade = $request->get('lastGrade');
        $dateJoined = $request->get('dateJoined');
        $password = $request->get('password');
        $currentGrade = $request->get('currentGrade');

        $student= student::getOneById($id);

        $student->setUsername($username);
        $student->setLastGrade($lastGrade);
        $student->setDateJoined($dateJoined);
        $student->setCurrentGrade($currentGrade);
        $student->setPassword($password);
        $updateSuccess = Student::update($student);

        if ($updateSuccess) {
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
