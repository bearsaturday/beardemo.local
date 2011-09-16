<?php
/**
 * App
 *
 * @category   BEAR
 * @package    bear.demo
 * @subpackage Page
 * @author     $Author:$ <username@example.com>
 * @license    @license@ http://@license_url@
 * @version    Release: @package_version@ $Id: exception2.php 470 2011-06-26 17:21:47Z koriyama@bear-project.net $
 * @link       http://@link_url@
 */

$_SERVER['bearmode'] = 0;
require_once 'App.php';

/**
 *
 * @category   BEAR
 * @package    bear.demo
 * @subpackage Page
 * @author     $Author:$ <username@example.com>
 * @license    @license@ http://@license_url@
 * @version    Release: @package_version@ $Id: exception2.php 470 2011-06-26 17:21:47Z koriyama@bear-project.net $
 * @link       http://@link_url@
 */
class Page_Test_Error_Exception2 extends App_Page
{
    /**
     * Init
     *
     * @return void
     */
    public function onInit(array $args)
    {
        throw new Expection();
    }

    public function onOutput()
    {
        echo "Expection in onInitリソーステスト終了";
    }
}

App_Main::run('Page_Test_Error_Exception2');