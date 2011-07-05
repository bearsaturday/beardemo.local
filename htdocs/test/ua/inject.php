<?php
/**
 * bear.demo
 *
 * @package Page
 */

$_SERVER['bearmode'] = 30;
require_once 'App.php';

/**
 * UA Injectテスト
 *
 * @package Page
 * @author  $Author:$
 * @version SVN: Release: $Id:$
 */
class Page_Test_Ua_Inject extends App_Page
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
    }

    public function onOutput()
    {
        $this->display();
    }
}

App_Main::run('Page_Test_Ua_Inject');