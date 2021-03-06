<?php
/**
 * class for the main controlls of the site
 */
namespace Itb\Controller;

use Itb\Model\Student;
use Itb\Model\technique;
use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class MainController
 * @package Itb\Controller
 */
class MainController
{
    /**
     * function open the classes twig fle from a selection on the navigation page
     * @param Request $request
     * @param Application $app
     * @return mixed
     */
    public function classesAction(Request $request, Application $app)
    {
        $argsArray = [
        ];

        $templateName = 'classes';
        return $app['twig']->render($templateName . '.html.twig', $argsArray);
    }

    /**
     * function to open the members page from the selection on the nav bar
     * @param Request $request
     * @param Application $app
     * @return mixed
     */
    public function membersAction(Request $request, Application $app)
    {
        $techniques = technique::getAll();

        $argsArray = [
            'techniques' => $techniques,

        ];

        $templateName = 'members';
        return $app['twig']->render($templateName . '.html.twig', $argsArray);
    }

    /**
     * function to load the index page if the index is selected
     * @param Request $request
     * @param Application $app
     * @return mixed
     */
    public function indexAction(Request $request, Application $app)
    {
        $argsArray = [];


        $templateName = 'index';
        return $app['twig']->render($templateName . '.html.twig', $argsArray);
    }

    /**
     * function to open admin page from the selection of the navigation bar
     * @param Request $request
     * @param Application $app
     * @return mixed
     */
    public function adminAction(Request $request, Application $app)
    {
        //$studentRepository = new StudentRepository();
        $students = student::getAll();

        $argsArray = [
            'students' => $students,
        ];
//        var_dump($argsArray);
//        die();
        $templateName = 'admin';
        return $app['twig']->render($templateName . '.html.twig', $argsArray);
    }
}
