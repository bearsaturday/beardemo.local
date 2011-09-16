<?php
/**
 * bear.demo
 *
 * @package Page
 */
$_SERVER['bearmode'] = 2;
require_once 'App.php';
require 'htdocs/Resource/Set/options.php';

/**
 * Pageのinitキャッシュテスト
 *
 * onInit()の内容をキャッシュします
 *
 * @package Page
 * @author  $Author:$
 * @version SVN: Release: $Id: page.php 447 2011-06-01 00:31:53Z koriyama@bear-project.net $
 */
class Page_Test_Page_Cache_Page extends Page_Resource_Set_Options
{
    /**
     * Inject
     *
     * @return void
     */
    public function onInject()
    {
        parent::onInject();
    }

    /**
     * Init
     *
     * @return void
     */
    public function onInit(array $args)
    {
        parent::onInit($args);
    }

    /**
     * 表示
     *
     * @return void
     */
    public function onOutput()
    {
        $this->display();
    }
}

$config = array('cache' => array('type' => 'page', 'life' => 10));
App_Main::run('Page_Test_Page_Cache_Init', $config);
