<?php
/**
 * This file is part of the beardemo.local package.
 *
 * @license http://opensource.org/licenses/bsd-license.php BSD
 */

// DB Sessionに
$_SERVER['bearmode'] = 3;
require_once 'App.php';
// ページファイル読み込み
BEAR_Main::includePage('test/session/file.php');

/**
 * DBセッション
 */
class Page_Test_Session_Memcache extends Page_Test_Session_File
{
    public function onOutput()
    {
        $this->display('db.tpl');
    }
}

App_Main::run('Page_Test_Session_Memcache');
