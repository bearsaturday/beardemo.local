<?php

$_SERVER['bearmode'] = 20;
require_once 'App.php';

/**
 * DBのslave / masterが正しく選択されるかのテスト
 */
class Page_Test_Page_Db_Rw extends App_Page
{
    public function onInject()
    {
        parent::onInject();
    }

    public function onInit(array $args)
    {
        $params = ['uri' => 'Test/Db/Entry'];
        $req1 = $this->_resource->read($params)->getBody();
        p($req1);
        $createParams = $params;
        $createParams['values'] = ['title' => time(), 'body' => ''];
        $this->_resource->create($createParams)->request();
        $req2 = $this->_resource->read($params)->getBody();
        p($req2);
    }

    public function onOutput()
    {
        echo 'TEST End';
    }
}

App_Main::run('Page_Test_Page_Db_Rw', []);
