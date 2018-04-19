<?php
/**
 * This file is part of the beardemo.local package.
 *
 * @license http://opensource.org/licenses/bsd-license.php BSD
 */
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
        $options = array('pager' => 25, 'template' => 'list/xml');
        $params = array('uri' => 'file:///Users/kooriyama/www/bear.demo/data/entries.xml', 'values' => array(), 'options' => $options);
        $this->_resource->read($params)->set('entry');
    }
}
BEAR_Main::run('Page_Resource_Xml');
