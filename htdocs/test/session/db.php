<?php

/**
 * bear.demo
 *
 * @package Page
 */

// DB Sessionに
$_SERVER['bearmode'] = 3;
require_once 'App.php';
// ページファイル読み込み
BEAR_Main::includePage('test/session/file.php');

/**
 * DBセッション
 *
 * @package Page
 * @author  $Author:$
 * @version SVN: Release: $Id:$
 */
class Page_Test_Session_Memcache extends Page_Test_Session_File
{
    /**
     * Output
     *
     * @return void
     */
    public function onOutput()
    {
        $this->display('db.tpl');
    }
}

App_Main::run('Page_Test_Session_Memcache');