<?php

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
            ['msg' => 'AJAXリクエスト成功!'],
            ['effect' => 'show']
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
            ['name' => 'チャーリー・チャップリン',
                'gender' => 'male',
                'blood' => 'O',
                'comment' => '人生はクローズアップで見れば悲劇。ロングショットで見れば喜劇。'
            ]
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
            ['msg' => 'クライアントのデータは常に送られます'],
            ['effect' => 'show']
        );
        /** @param $ajax BEAR_Page_Ajax */
        $ajaxReq = $this->_ajax->getAjaxRequest();
        $args = '<pre>' . print_r($ajaxReq, true) . '</pre>';
        $this->_ajax->addAjax(
            'html',
            ['args' => $args],
            ['effect' => 'show']
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
            ['demo' => '#bearlogo']
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
             ['img_msg' => 'AJAX OK!'],
             ['effect' => 'show']
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
