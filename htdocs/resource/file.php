<?php

require_once 'App.php';

/**
 * スタティックリソース
 *
 * csvファイルをリソースとして使用しています。
 */
class Page_Resource_File extends App_Page
{
    public function onInject()
    {
        parent::onInject();
    }

    public function onInit(array $config)
    {
        $params1 = ['uri' => 'file:///var/www/bear.demo/data/data.txt'];
        $body = $this->_resource->read($params1)->set('hello')->getBody();
        $options = ['template' => 'list/entrys'];
        $values = ['header' => true];
        $params2 = [
            'uri' => 'file:///var/www/bear.demo/data/entries.csv',
            'values' => $values,
            'options' => $options
        ];
        $this->_resource->read($params2)->set('cat');
    }
}

App_Main::run('Page_Resource_File');
