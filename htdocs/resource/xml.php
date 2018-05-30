<?php

require_once 'App.php';

/**
 * スタティックXMLリソース
 *
 * csvファイルをリソースとして使用しています。
 */
class Page_Resource_Xml extends App_Page
{
    public function onInject()
    {
        parent::onInject();
    }

    public function onInit(array $config)
    {
        $options = ['pager' => 25, 'template' => 'list/xml'];
        $params = ['uri' => 'file:///Users/kooriyama/www/bear.demo/data/entries.xml', 'values' => [], 'options' => $options];
        $this->_resource->read($params)->set('entry');
    }
}

BEAR_Main::run('Page_Resource_Xml');
