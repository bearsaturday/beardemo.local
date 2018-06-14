<?php

require_once 'App.php';

/**
 * HTML
 *
 * htmlコマンドを返します。受け取ったJSは指定のIDにコンテンツを差し込みます。
 */
class Page_Ajax_Basic_Ajax_Html extends App_Page
{
    public function onInject()
    {
        $this->_ajax = BEAR::dependency('BEAR_Page_Ajax');
    }

    public function onInit(array $args)
    {
    }

    public function onOutput()
    {
        $this->_ajax->addAjax(
            'html',
            [
            'msg' => 'AJAXリクエスト成功!',
            'time' => date('r')],
            ['effect' => 'show']
        );
        $this->output('ajax');
    }
}

BEAR_Main::run('Page_Ajax_Basic_Ajax_Html');
