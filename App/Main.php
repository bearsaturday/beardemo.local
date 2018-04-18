<?php
/**
 * This file is part of the beardemo.local package.
 *
 * @license http://opensource.org/licenses/bsd-license.php BSD
 */

/**
 * Main
 *
 */
class App_Main extends BEAR_Main
{
    /**
     * Inject
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
     */
    public function onException(Exception $e)
    {
    }
}
