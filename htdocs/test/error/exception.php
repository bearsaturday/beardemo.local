<?php

$_SERVER['bearmode'] = 0;
require_once 'App.php';

class Page_Test_Error_Exception extends App_Page
{
    public function onInit(array $args)
    {
        $this->_resource->read(['uri' => 'Sample/Error'])->getRo();
    }
}

App_Main::run('Page_Test_Error_Exception');
