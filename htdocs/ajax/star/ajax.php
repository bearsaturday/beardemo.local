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
        $this->_ajax = BEAR::dependency('BEAR_Page_Ajax');
        $this->injectAjaxRequest();
        parent::onInject();
    }

    public function onInit(array $args)
    {
    }

    /**
     * レート変更
     *
     * スターによるレートの変更を受け付けます。
     */
    public function onClickRate(array $args)
    {
        $rate = $args['click'];
        $this->_ajax->addAjax(
            'html',
            ['hover-tip' => "<b>星[{$rate}]の評価を受け付けました!</b>"],
            ['effect' => 'show']
        );
    }

    public function onOutput()
    {
        $this->output('ajax');
    }
}

BEAR_Main::run('Page_Ajax_Link_Ajax');
