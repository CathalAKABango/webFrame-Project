<?php
namespace Itb;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

class MainController
{
    /**
     * render the days page template
     */
    public function daysAction(Request $request, Application $app)
    {
        $days = array(
            'Classes',
            'Classes',
            'Classes',
            'Classes',
            'Classes',
            'Classes',
            'Classes'
        );


        $argsArray = [
            'days' => $days,
        ];

        $templateName = 'days';
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
}