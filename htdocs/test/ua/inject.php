<?php

$_SERVER['bearmode'] = 30;
require_once 'App.php';

/**
 * UA Injectテスト
 */
class Page_Test_Ua_Inject extends App_Page
{
    public function onOutput()
    {
        $this->display();
    }
}

App_Main::run('Page_Test_Ua_Inject');
