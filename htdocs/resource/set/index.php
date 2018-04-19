<?php
/**
 * This file is part of the beardemo.local package.
 *
 * @license http://opensource.org/licenses/bsd-license.php BSD
 */
require_once 'App.php';

/**
 * リソースセットオプション
 *
 * ページセットオプションを変えてリソースをページにsetしています。
 *
 * @license    @license@ http://@license_url@
 *
 * @link       http://@link_url@
 */
class Page_Resource_Set_Index extends App_Page
{
    /**
     * Inject
     */
    public function onInject()
    {
        parent::onInject();
    }

    /**
     * Init
     *
     * @requied id
     */
    public function onInit(array $args)
    {
        // bodyをeagerでset
        $params = array('uri' => 'Entry', 'values' => array(), 'options' => array());
        $this->_resource->read($params)->set('arrayEntry', 'value');
        // bodyをeagerでset
        $options = array('template' => 'list/entry');
        $params = array('uri' => 'Entry', 'values' => array(), 'options' => $options);
        $this->_resource->read($params)->set('stringEntry', 'value');
        // objectをeagerでset (resource template付)
        $options = array('template' => 'list/entry');
        $params = array('uri' => 'Entry', 'options' => $options);
        $this->_resource->read($params)->set('objectEntry', 'object');
        // objectをlazyでset (resource template付)
        $options = array('template' => 'list/entry');
        $params = array('uri' => 'Entry', 'options' => $options);
        $this->_resource->read($params)->set('lazyEntry', 'lazy');
        // objectをlazyでset (resource templateなし)
        $params = array('uri' => 'Entry');
        $ro = $this->_resource->read($params)->set('entry5', 'object')->getRo();
        // PHP 5.3 Only
        $values = array('id' => 1);
        $data = $ro($values)->getBody();
        $this->set('data', $data);
    }

    /**
     * Output
     */
    public function onOutput()
    {
        $this->display();
    }
}

$options = array();
$options['cache']['type'] = 'init';
$options['cache']['life'] = 10;
App_Main::run('Page_Resource_Set_Index', $options);
