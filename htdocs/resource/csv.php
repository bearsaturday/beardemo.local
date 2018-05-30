<?php

require_once 'App.php';

/**
 * スタティックリソース
 *
 * csvファイルをリソースとして使用しています。
 */
class Page_Resource_Csv extends App_Page
{
    public function onInit(array $config)
    {
        $params = [
            'uri' => 'Post/tokyo.csv',
            'values' => [],
            'options' => ['pager' => 25]
        ];
        $ro = $this->_resource->read($params)->set('post');
    }

    public function onOntput()
    {
        $this->display('csv.tpl');
    }
}
BEAR_Main::run('Page_Resource_Csv');
