<?php
/**
 * This file is part of the beardemo.local package.
 *
 * @license http://opensource.org/licenses/bsd-license.php BSD
 */
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
        $params1 = array('uri' => 'file:///var/www/bear.demo/data/data.txt');
        $body = $this->_resource->read($params1)->set('hello')->getBody();
        $options = array('template' => 'list/entrys');
        $values = array('header' => true);
        $params2 = array(
            'uri' => 'file:///var/www/bear.demo/data/entries.csv',
            'values' => $values,
            'options' => $options
        );
        $body = $this->_resource->read($params2)->set('cat');
    }
}

App_Main::run('Page_Resource_File');
