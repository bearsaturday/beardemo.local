<?php

$_SERVER['bearmode'] = 0;
require_once 'App.php';

class Page_Test_Error_Exception2 extends App_Page
{
    public function onInit(array $args)
    {
        throw new Expection();
    }
}

App_Main::run('Page_Test_Error_Exception2');
