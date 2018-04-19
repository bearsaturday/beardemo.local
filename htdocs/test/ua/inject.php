<?php
/**
 * This file is part of the beardemo.local package.
 *
 * @license http://opensource.org/licenses/bsd-license.php BSD
 */
$_SERVER['bearmode'] = 30;
require_once 'App.php';

/**
 * UA Injectテスト
 */
class Page_Test_Ua_Inject extends App_Page
{
    public function onInject()
    {
        parent::onInject();
    }

    public function onInit(array $args)
    {
    }

    public function onOutput()
    {
        $this->display();
    }
}

App_Main::run('Page_Test_Ua_Inject');
