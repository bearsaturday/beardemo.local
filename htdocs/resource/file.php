<?php
/**
 * App
 *
 * @category   BEAR
 * @package    bear.demo
 * @subpackage Page
 * @author     $Author:$ <username@example.com>
 * @license    @license@ http://@license_url@
 * @version    Release: @package_version@ $Id: file.php 447 2011-06-01 00:31:53Z koriyama@bear-project.net $
 * @link       http://@link_url@
 */

require_once 'App.php';

/**
 * スタティックリソース
 *
 * csvファイルをリソースとして使用しています。
 *
 * @category   BEAR
 * @package    bear.demo
 * @subpackage Page
 * @author     $Author:$ <username@example.com>
 * @license    @license@ http://@license_url@
 * @version    Release: @package_version@ $Id: file.php 447 2011-06-01 00:31:53Z koriyama@bear-project.net $
 * @link       http://@link_url@
 */
class Page_Resource_File extends App_Page
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