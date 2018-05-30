<?php

require_once 'App.php';

/**
 * BEAR_Page::display()テスト 2
 *
 * レイアウトファイルオプションを指定します
 */
class Page_Test_Page_Layout extends App_Page
{
    private $_hasLayoutOption = false;

    public function onInject()
    {
        $this->_hasLayoutOption = isset($_GET['l']) ? true : false;
        parent::onInject();
    }

    public function onInit(array $args)
    {
    }

    public function onOutput()
    {
        if ($this->_hasLayoutOption === false) {
            $this->display('layout.tpl');
        } else {
            p('layoutオプションを使用中');
            $this->display('layout.tpl', ['layout' => 'test.tpl']);
        }
    }
}

App_Main::run('Page_Test_Page_Layout');
