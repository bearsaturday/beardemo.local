<?php
/**
 * This file is part of the beardemo.local package.
 *
 * @license http://opensource.org/licenses/bsd-license.php BSD
 */
require_once 'App.php';

/**
 * AJAXサービス
 *
 * clickイベントに応じて、返すbear.jsコマンド(JSON)を変えています。
 */
class Page_Ajax_Link_Ajax extends App_Page
{
    /**
     * @var BEAR_Page_Ajax
     */
    private $_ajax;

    public function onInject()
    {
        parent::onInject();
        $this->_ajax = BEAR::dependency('BEAR_Page_Ajax');
        $this->injectAjaxRequest();
    }

    public function onInit(array $args)
    {
    }

    /**
     * Run 1 - HTML
     *
     * @param array $args
     */
    public function onClickHtml(array $args)
    {
        $this->_ajax->addAjax(
            'html',
            array('msg' => 'AJAXリクエスト成功!'),
            array('effect' => 'show')
        );
    }

    /**
     * Run 3 - Val
     *
     * @param array $args
     */
    public function onClickVal(array $args)
    {
        $this->_ajax->addAjax(
            'val',
            array('name' => 'チャーリー・チャップリン',
                'gender' => 'male',
                'blood' => 'O',
                'comment' => '人生はクローズアップで見れば悲劇。ロングショットで見れば喜劇。'
            )
        );
    }

    /**
     * Run 4 - 値を読む
     *
     * @param array $args
     */
    public function onClickRead(array $args)
    {
        $this->_ajax->addAjax(
            'html',
            array('msg' => 'クライアントのデータは常に送られます'),
            array('effect' => 'show')
        );
        /** @param $ajax BEAR_Page_Ajax */
        $ajaxReq = $this->_ajax->getAjaxRequest();
        $args = '<pre>' . print_r($ajaxReq, true) . '</pre>';
        $this->_ajax->addAjax(
            'html',
            array('args' => $args),
            array('effect' => 'show')
        );
    }

    /**
     * Run 5 - JSをコール
     *
     * @param array $args
     */
    public function onClickJs(array $args)
    {
        $this->_ajax->addAjax(
            'js',
            array('demo' => '#bearlogo')
        );
    }

    /**
     * Aタグ意外にはりつけ
     *
     * @param array $args
     */
    public function onClickImg(array $args)
    {
        $this->_ajax->addAjax(
             'html',
             array('img_msg' => 'AJAX OK!'),
             array('effect' => 'show')
         );
    }

    /**
     * Output
     */
    public function onOutput()
    {
        $this->output('ajax');
    }
}

BEAR_Main::run('Page_Ajax_Link_Ajax');
