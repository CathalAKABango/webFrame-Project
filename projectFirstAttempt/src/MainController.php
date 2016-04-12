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
    public function listAction(Request $request, Application $app)
    {
        $studentRepository = new StudentRepository();
        $students = $studentRepository->getAll();

        $argsArray = [
            'students' => $students,
        ];

        $templateName = 'list';
        return $app['twig']->render($templateName . '.html.twig', $argsArray);
    }
}