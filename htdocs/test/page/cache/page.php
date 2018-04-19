<?php
/**
 * This file is part of the beardemo.local package.
 *
 * @license http://opensource.org/licenses/bsd-license.php BSD
 */
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

$config = array('cache' => array('type' => 'page', 'life' => 10));
App_Main::run('Page_Test_Page_Cache_Init', $config);
