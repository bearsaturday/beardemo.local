<?php
/**
 * App
 *
 * @category   BEAR
 * @package    bear.demo
 * @subpackage Main
 * @author     $Author:$ <username@example.com>
 * @license    @license@ http://@license_url@
 * @version    Release: @package_version@ $Id:$
 * @link       http://@link_url@
 */

/**
 * Main
 *
 * @category   BEAR
 * @package    bear.demo
 * @subpackage Main
 * @author     $Author:$ <username@example.com>
 * @license    @license@ http://@license_url@
 * @version    Release: @package_version@ $Id:$
 * @link       http://@link_url@
 */
class App_Main extends BEAR_Main
{
    /**
     * Inject
     *
     * @return void
     */
    public function onInject()
    {
        // エージェントスニッフィング
        BEAR_Main_Ua_Injector::inject($this, $this->_config);
        parent::onInject();
    }

    /**
     * アプリケーション共通の例外処理
     *
     * @param Exception $e
     *
     * @return void
     */
    public function onException(Exception $e)
    {
    }
}