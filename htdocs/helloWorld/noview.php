<?php
/**
 * This file is part of the beardemo.local package.
 *
 * @license http://opensource.org/licenses/bsd-license.php BSD
 */
require_once 'App.php';

/**
 * HelloWorld with no view
 *
 */
class Page_HelloWorld_NoView extends App_Page
{
    public function onInject()
    {
    }

    public function onInit(array $args)
    {
        $this->set('message', 'Hello World!');
    }

    public function onOutput()
    {
        $view = $this->getValues();
        require _BEAR_APP_HOME . '/App/views/pages/hello/noview.php';
    }
}

App_Main::run('Page_HelloWorld_NoView');
