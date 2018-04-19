<?php
/**
 * This file is part of the beardemo.local package.
 *
 * @license http://opensource.org/licenses/bsd-license.php BSD
 */
$_SERVER['bearmode'] = 0;
require_once 'App.php';

class Page_Test_Error_Exception2 extends App_Page
{
    public function onInit(array $args)
    {
        throw new Expection();
    }

    public function onOutput()
    {
        echo 'Expection in onInitリソーステスト終了';
    }
}

App_Main::run('Page_Test_Error_Exception2');
