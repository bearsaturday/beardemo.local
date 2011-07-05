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

$_SERVER['bearmode'] = 1;
require_once 'App.php';

/**
 * リソースエラー
 *
 * @category   BEAR
 * @package    bear.demo
 * @subpackage Page
 * @author     $Author:$ <username@example.com>
 * @license    @license@ http://@license_url@
 * @version    Release: @package_version@ $Id:$
 * @link       http://@link_url@
 */
class Page_Test_Error_Resource extends App_Page
{
    public function onClickRead()
    {
        // リソース内で例外発生
        $result = $this->_resource->read(array('uri' =>"Sample/Error"))->getRo();
    }

    public function onClickCreate()
    {
        // リソース内で例外発生
        $result = $this->_resource->create(array('uri' =>"Sample/Error"))->getRo();
    }

    /**
     * Init
     *
     * @return void
     */
    public function onInit(array $args)
    {
    }

    public function onOutput()
    {
        $this->display();
    }
}

App_Main::run('Page_Test_Error_Resource');