<?php
/**
 * This file is part of the beardemo.local package.
 *
 * @license http://opensource.org/licenses/bsd-license.php BSD
 */

/**
 * Session
 */
class App_Session extends BEAR_Base
{
    /**
     * セッション延長
     *
     * @var string
     */
    const EXTEND = 'extend';

    /**
     * ログアウト
     *
     * @var string
     */
    const LOGOUT = 'logout';

    /**
     * Constructor
     *
     * @param array $config
     */
    public function __construct(array $config)
    {
        parent::__construct($config);
    }

    /**
     * Injectー
     */
    public function onInject()
    {
        //セッション
        $this->_session = BEAR::dependency('BEAR_Session');
        $this->_header = BEAR::dependency('BEAR_Page_Header');
        switch (true) {
            case isset($_GET['extend']):
                // セッション延長
                $this->_mode = self::EXTEND;
                break;
            case isset($_GET['logout']):
                // セッション破棄
                $this->_mode = self::LOGOUT;
                break;
            default:
                // どうしますか画面
                $this->_mode = null;
        }
    }

    /**
     * セッションタイムアウト
     *
     * @throws App_Ro_Test_Aop_Throwing2_Exception セッションタイムアウト例外
     */
    public function onSessionTimeOut()
    {
        switch (true) {
            case $this->_mode === self::EXTEND:
                $this->_session->updateIdle();
                $uri = $this->_session->get('url');
                $this->_header->redirect($uri);
                break;
            case $this->_mode === self::LOGOUT:
                $this->_session->destroy();
                $this->_header->redirect('.');
                break;
            default:
                //セッションタイムアウト画面
                throw $this->_exception('Session Timeout');
        }
    }
}
