<?php

/**
 * App
 *
 * @package App
 * @subpackage page
 */
require_once 'App.php';

/**
 * スタティックXMLリソース
 *
 * <pre>
 * csvファイルをリソースとして使用しています。
 * </pre>
 *
 * @package Page
 * @author  $Author:$
 * @version SVN: Release: $Id: xml.php 431 2011-05-30 18:03:19Z koriyama@bear-project.net $
 */
class Page_Resource_Xml extends App_Page
{

    /**
     * Inject
     *
     * @return void
     */
    public function onInject()
    {
        parent::onInject();
    }

    /**
     * Init
     *
     * @return void
     */
    public function onInit(array $config)
    {
        $options = array('pager' => 25, 'template' => 'list/xml');
        $params = array('uri' => 'file:///Users/kooriyama/www/bear.demo/data/entries.xml', 'values' => array(), 'options' => $options);
        $ro = $this->_resource->read($params)->set('entry');
    }
}
BEAR_Main::run('Page_Resource_Xml');