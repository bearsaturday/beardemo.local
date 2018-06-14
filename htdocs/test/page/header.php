<?php

require_once 'App.php';

/**
 * BEAR_Page_Header::setHeader()テスト
 *
 * ヘッダーサービスを使ったヘッダー出力テストです。
 */
class Page_Test_Page_Header extends App_Page
{
    /**
     * @var BEAR_Page_Header
     */
    private $_header;

    public function onInject()
    {
        $this->_header = BEAR::dependency('BEAR_Page_Header');
    }

    public function onInit(array $args)
    {
        $this->_header->setHeader('cache-control:no-cache');
        $this->_header->setHeader('test-beardemo-header:1');
        $this->_header->setHeader('pragma:no-cache');
        $this->_header->setHeader('content-type:text/plain;charset=utf-8');
    }

    public function onOutput()
    {
        $this->display('/hello.tpl');
    }
}

App_Main::run('Page_Test_Page_Header');
