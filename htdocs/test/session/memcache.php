<?php

/**
 * bear.demo
 *
 * @package Page
 */

// DB Sessionに
$_SERVER['bearmode'] = 5;
require_once 'App.php';
// ページファイル読み込み
BEAR_Main::includePage('test/session/file.php');

/**
 * DBセッション
 *
 * @package Page
 * @author  $Author:$
 * @version SVN: Release: $Id: memcache.php 447 2011-06-01 00:31:53Z koriyama@bear-project.net $
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
        $this->display('memcache.tpl');
    }
}

App_Main::run('Page_Test_Session_Memcache');