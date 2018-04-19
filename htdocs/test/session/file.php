<?php
/**
 * This file is part of the beardemo.local package.
 *
 * @license http://opensource.org/licenses/bsd-license.php BSD
 */

// File Sessionに
$_SERVER['bearmode'] = 4;
require_once 'App.php';

/**
 * ファイルセッション
 */
class Page_Test_Session_File extends App_Page
{
    public function onInject()
    {
        parent::onInject();
    }

    /**
     * クリック
     */
    public function onClickNone()
    {
        $this->_session->set('test', time());
    }

    /**
     * クリック
     *
     * セッション取得
     */
    public function onClickGet()
    {
        $test = $this->_session->get('test');
        $this->set('test', $test);
        $this->display('get.tpl');
        $this->end();
    }

    public function onInit(array $args)
    {
    }

    public function onOutput()
    {
        $this->display('file.tpl');
    }
}

App_Main::run('Page_Test_Session_File');
