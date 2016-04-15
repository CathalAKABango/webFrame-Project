<?php
namespace Itb;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

class MainController
{
    /**
     * render the days page template
     */
    public function classesAction(Request $request, Application $app)
    {



        $argsArray = [
        ];

        $templateName = 'classes';
        return $app['twig']->render($templateName . '.html.twig', $argsArray);
    }

    /**
     * render the About page template
     */
    public function membersAction(Request $request, Application $app)
    {
        $argsArray = [];


        $templateName = 'members';
        return $app['twig']->render($templateName . '.html.twig', $argsArray);
    }

    /**
     * render the Index page template
     */
    public function indexAction(Request $request, Application $app)
    {
        $argsArray = [];


        $templateName = 'index';
        return $app['twig']->render($templateName . '.html.twig', $argsArray);
    }
    public function adminAction(Request $request, Application $app)
    {
        $studentRepository = new StudentRepository();
        $students = $studentRepository->getAll();

        $argsArray = [
            'students' => $students,
        ];

        $templateName = 'admin';
        return $app['twig']->render($templateName . '.html.twig', $argsArray);
    }
    public function addUserAction($twig)
    {
        // now sanitise with filter_var()
        $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING);
        $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
        $lastGrade = filter_input(INPUT_POST, 'lastGrade', FILTER_SANITIZE_STRING);
        $dateJoined = filter_input(INPUT_POST, 'dateJoined', FILTER_SANITIZE_STRING);

        // create message object
        $student = new Student();
        $student->setUsername($username);
        $student->setLastGrade($lastGrade);
        $student->setDateJoined($dateJoined);

        // use MessageRepository to store new Message object
//        $messageRepository = new MessageRepository();
        $messageRepository = new DataBaseTableRepository('Student', 'messages');
        if($messageRepository->add($id)) {
            $this->messagesAction($twig);
        }
        return false;
//        } else {
//            $errorMessage = 'there was a problem editing your message in the database ...';
//            $errorController = new ErrorController();
//            $errorController->messagesAction($twig, $errorMessage);
//        }
    }
}