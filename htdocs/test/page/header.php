<?php
/**
 * bear.demo
 *
 * @package Page
 */
require_once 'App.php';

/**
 * BEAR_Page_Header::setHeader()テスト
 *
 * <pre>
 * ヘッダーサービスを使ったヘッダー出力テストです。
 * </pre>
 *
 * @package Page
 * @author  $Author:$
 * @version SVN: Release: $Id:$
 */
class Page_Test_Page_Header extends App_Page
{
    /**
     * Inject
     *
     * @return void
     */
    public function onInject()
    {
        $this->_header = BEAR::dependency('BEAR_Page_Header');
    }

    /**
     * Init
     *
     * @return void
     */
    public function onInit(array $args)
    {
        $this->_header->setHeader('cache-control:no-cache');
        $this->_header->setHeader('test-beardemo-header:1');
        $this->_header->setHeader('pragma:no-cache');
        $this->_header->setHeader('content-type:text/plain;charset=utf-8');
    }

    /**
     * 表示
     *
     * @return void
     */
    public function onOutput()
    {
        $this->display('/hello.tpl');
    }
}

App_Main::run('Page_Test_Page_Header');