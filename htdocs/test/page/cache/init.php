<?php
/**
 * bear.demo
 *
 * @package Page
 */
$_SERVER['bearmode'] = 2;
require_once 'App.php';
//require_once 'MDB2.php';
require 'htdocs/Resource/Set/options.php';

/**
 * BEAR_Pageのinitキャッシュのテスト
 *
 * <pre>
 * initキャッシュで
 * </pre>
 *
 * @package Page
 * @author  $Author:$
 * @version SVN: Release: $Id:$
 */
class Page_Test_Page_Cache_Init extends Page_Resource_Set_Options
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

$config = array('cache' => array('type' => 'init', 'life' => 1));
App_Main::run('Page_Test_Page_Cache_Init', $config);
