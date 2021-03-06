<?php

require_once 'App.php';

class Page_Http_404 extends App_Page
{
    public function onInject()
    {
        parent::onInject();
    }

    public function onInit(array $args)
    {
        throw new Panda_Exception('Not found', 404);
    }
}

App_Main::run('Page_Http_404');
