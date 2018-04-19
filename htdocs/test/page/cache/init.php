<?php

$_SERVER['bearmode'] = 2;
require_once 'App.php';
//require_once 'MDB2.php';
require 'htdocs/Resource/Set/options.php';

/**
 * BEAR_Pageのinitキャッシュのテスト
 *
 * initキャッシュで
 */
class Page_Test_Page_Cache_Init extends Page_Resource_Set_Options
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

$config = array('cache' => array('type' => 'init', 'life' => 1));
App_Main::run('Page_Test_Page_Cache_Init', $config);
