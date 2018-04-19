<?php
/**
 * This file is part of the beardemo.local package.
 *
 * @license http://opensource.org/licenses/bsd-license.php BSD
 */

// DB Sessionに
$_SERVER['bearmode'] = 5;
require_once 'App.php';
// ページファイル読み込み
BEAR_Main::includePage('test/session/file.php');

class Page_Test_Session_Memcache extends Page_Test_Session_File
{
    public function onOutput()
    {
        $this->display('memcache.tpl');
    }
}

App_Main::run('Page_Test_Session_Memcache');
