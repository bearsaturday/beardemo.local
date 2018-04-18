<?php
/**
 * This file is part of the beardemo.local package.
 *
 * @license http://opensource.org/licenses/bsd-license.php BSD
 */

/**
 * Page
 *
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
     */
    public function onInject()
    {
        parent::onInject();
        $this->_session = BEAR::dependency('BEAR_Session');
        $this->_resource = BEAR::dependency('BEAR_Resource');
    }

    /**
     * Output
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
            $this->set('e', (string) $e->getMessage());
            throw $e;
        }
    }
}
