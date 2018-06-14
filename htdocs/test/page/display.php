<?php

require_once 'App.php';

/**
 * BEAR_Page::display()テスト
 *
 * テンプレートを相対パスと絶対パスで正しいテンプレートが表示されるかのテストです。
 * /で始まればApp/view/page/から
 * そうでなければページクラスに該当するところからの相対パス指定です。
 */
class Page_Test_Page_Display extends App_Page
{
    public function onOutput()
    {
        $this->display('/hello.tpl');
        $this->display('/hello/hello.tpl');
        $this->display('/hello/hello/hello.tpl');
        $this->display('hello.tpl');
        $this->display('hello/hello.tpl');
        $this->display('hello/hello/hello.tpl');
    }
}

App_Main::run('Page_Test_Page_Display');
