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

/**
 * Page
 *
 * @category   BEAR
 * @package    bear.demo
 * @subpackage Page
 * @author     $Author:$ <username@example.com>
 * @license    @license@ http://@license_url@
 * @version    Release: @package_version@ $Id:$
 * @link       http://@link_url@
 */
abstract class App_Page extends BEAR_Page
{

    /**
     *  セッション
     *
     * @var BEAR_Session
     */
    protected $_session;

    /**
     * リソースアクセス
     *
     * @var BEAR_Resource
     */
    protected $_resource;

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
     * Inject
     *
     * @return void
     */
    public function onInject()
    {
        parent::onInject();
        $this->_session = BEAR::dependency('BEAR_Session');
        $this->_resource = BEAR::dependency('BEAR_Resource');
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

    /**
     * 例外
     *
     * @param Exception $e
     *
     * @return void
     * @throws Exception 受け取った例外
     */
    public function onException(Exception $e)
    {
        try {
            throw $e;
        } catch (App_Session_Exception $e) {
            // セッションタイムアウト
            $idle = BEAR::get('BEAR_Session')->getConfig('idle');
            $this->set('idle', $idle);
            $this->display('/session/timeout.tpl');
            $this->end();
        } catch (Exception $e) {
            // テスト確認のためにセット
            $this->set('e', (string)$e->getMessage());
        }
    }
}
