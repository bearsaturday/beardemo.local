<?php


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
