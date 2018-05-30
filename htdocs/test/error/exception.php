<?php

$_SERVER['bearmode'] = 0;
require_once 'App.php';

class Page_Test_Error_Exception extends App_Page
{
    /**
     * Init
     */
    public function onInit(array $args)
    {
        $result = $this->_resource->read(['uri' => 'Sample/Error'])->getRo();
    }

    public function onOutput()
    {
        echo 'Bad　Reuestリソーステスト終了';
    }
}

App_Main::run('Page_Test_Error_Exception');
