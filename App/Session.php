<?php
/**
 * App
 *
 * @category   BEAR
 * @package    bear.demo
 * @subpackage Session
 * @author     $Author:$ <username@example.com>
 * @license    @license@ http://@license_url@
 * @version    Release: @package_version@ $Id:$
 * @link       http://@link_url@
 */

/**
 * Session
 *
 * @category   BEAR
 * @package    bear.demo
 * @subpackage Session
 * @author     $Author:$ <username@example.com>
 * @license    @license@ http://@license_url@
 * @version    Release: @package_version@ $Id:$
 * @link       http://@link_url@
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
     *
     * @return void
     */
    public function onInject()
    {
        //セッション
        $this->_session = BEAR::dependency('BEAR_Session');
        $this->_header = BEAR::dependency('BEAR_Page_Header');
        switch (true) {
            case (isset($_GET['extend'])):
                // セッション延長
                $this->_mode = self::EXTEND;
                break;
            case (isset($_GET['logout'])):
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
     * @return void
     * @throws App_Ro_Test_Aop_Throwing2_Exception セッションタイムアウト例外
     */
    public function onSessionTimeOut()
    {
        switch (true) {
            case ($this->_mode === self::EXTEND):
                $this->_session->updateIdle();
                $uri = $this->_session->get('url');
                $this->_header->redirect($uri);
                break;
            case ($this->_mode === self::LOGOUT):
                $this->_session->destroy();
                $this->_header->redirect('.');
                break;
            default:
                //セッションタイムアウト画面
                throw $this->_exception('Session Timeout');
        }
        return;
    }
}