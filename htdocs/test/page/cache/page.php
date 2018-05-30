<?php

$_SERVER['bearmode'] = 2;
require_once 'App.php';
require 'htdocs/Resource/Set/options.php';

/**
 * Pageのinitキャッシュテスト
 *
 * onInit()の内容をキャッシュします
 */
class Page_Test_Page_Cache_Page extends Page_Resource_Set_Options
{
    public function onInject()
    {
        parent::onInject();
    }

    public function onInit(array $args)
    {
        parent::onInit($args);
    }

    public function onOutput()
    {
        $this->display();
    }
}

$config = ['cache' => ['type' => 'page', 'life' => 10]];
App_Main::run('Page_Test_Page_Cache_Init', $config);
