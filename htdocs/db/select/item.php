<?php
/**
 * App
 *
 * @category   BEAR
 * @package    bear.demo
 * @subpackage Page
 * @author     $Author:$ <username@example.com>
 * @license    @license@ http://@license_url@
 * @version    Release: @package_version@ $Id:$
 * @link       http://@link_url@
 */

require_once 'App.php';

/**
 * 記事表示ページ
 *
 * $_GET['id']で与えられたidの記事を表示します
 *
 * @category   BEAR
 * @package    bear.demo
 * @subpackage Page
 * @author     $Author:$ <username@example.com>
 * @license    @license@ http://@license_url@
 * @version    Release: @package_version@ $Id:$
 * @link       http://@link_url@
 */
class Page_Db_Select_Item extends App_Page
{
    /**
     * Inject
     *
     * @return void
     */
    public function onInject()
    {
        parent::onInject();
        $this->injectGet('id');
    }

    /**
     * Init
     *
     * @required id
     *
     * @return void
     */
    public function onInit(array $args)
    {
        $uri = 'Entry';
        $params = array('uri' => $uri, 'values' => $args, 'options' => array());
        $this->_resource->read($params)->set('entry');
    }

    /**
     * Output
     *
     * @return void
     */
    public function onOutput()
    {
        $this->display();
    }
}

App_Main::run('Page_Db_Select_Item');