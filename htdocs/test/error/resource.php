<?php

$_SERVER['bearmode'] = 1;
require_once 'App.php';

/**
 * リソースエラー
 */
class Page_Test_Error_Resource extends App_Page
{
    public function onClickRead()
    {
        // リソース内で例外発生
        $this->_resource->read(['uri' => 'Sample/Error'])->getRo();
    }

    public function onClickCreate()
    {
        // リソース内で例外発生
        $result = $this->_resource->create(['uri' => 'Sample/Error'])->getRo();
    }

    public function onInit(array $args)
    {
    }

    public function onOutput()
    {
        $this->display();
    }
}

App_Main::run('Page_Test_Error_Resource');
