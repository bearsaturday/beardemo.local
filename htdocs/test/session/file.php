<?php
/**
 * bear.demo
 *
 * @package Page
 */

// File Sessionに
$_SERVER['bearmode'] = 4;
require_once 'App.php';

/**
 * ファイルセッション
 *
 * @package Page
 * @author  $Author:$
 * @version SVN: Release: $Id:$
 */
class Page_Test_Session_File extends App_Page
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
     * クリック
     *
     * @return void
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

    /**
     * Init
     *
     * @return void
     */
    public function onInit(array $args)
    {
    }

    /**
     * Output
     *
     * @return void
     */
    public function onOutput()
    {
        $this->display('file.tpl');
    }
}

App_Main::run('Page_Test_Session_File');