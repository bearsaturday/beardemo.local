<?php
/**
 * This file is part of the beardemo.local package.
 *
 * @license http://opensource.org/licenses/bsd-license.php BSD
 */
require_once 'App.php';

/**
 * BEAR_Page_Header::setHeader()テスト
 *
 * ヘッダーサービスを使ったヘッダー出力テストです。
 */
class Page_Test_Page_Header extends App_Page
{
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
