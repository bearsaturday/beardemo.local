<?php
/**
 * App
 *
 * @category   BEAR
 * @package    bear.demo
 * @subpackage Ro
 * @author     $Author:$ <username@example.com>
 * @license    @license@ http://@license_url@
 * @version    Release: @package_version@ $Id:$
 * @link       http://@link_url@
 */

/**
 * Thorowing2 test resource
 *
 * @category   BEAR
 * @package    bear.demo
 * @subpackage Ro
 * @author     $Author:$ <username@example.com>
 * @license    @license@ http://@license_url@
 * @version    Release: @package_version@ $Id:$
 * @link       http://@link_url@
 */
class App_Ro_Test_Aop_Throwing2 extends App_Ro_Test_Aop
{
    /**
     * Read
     *
     * @return void
     *
     * @aspect throwing App_Aspect_Test_Throwing 例外テスト
     * @throws Exception リソース例外
     */
    public function onRead($values)
    {
        throw new Exception('リソースで例外');
    }
}