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

$_SERVER['bearmode'] = 0;
require_once 'App.php';

/**
 * AJAX Formページ
 *
 * @category   BEAR
 * @package    bear.demo
 * @subpackage Page
 * @author     $Author:$ <username@example.com>
 * @license    @license@ http://@license_url@
 * @version    Release: @package_version@ $Id:$
 * @link       http://@link_url@
 */
class Page_Test_Error_Exception extends App_Page
{
    /**
     * Init
     *
     * @return void
     */
    public function onInit(array $args)
    {
        $result = $this->_resource->read(array('uri' =>"Sample/Error"))->getRo();
    }

    public function onOutput()
    {
        echo "Bad　Reuestリソーステスト終了";
    }
}

App_Main::run('Page_Test_Error_Exception');