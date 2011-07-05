<?php
/**
 * bear.demo
 *
 * @package Page
 */
require_once 'App.php';

/**
 * BEAR_Page::display()テスト 2
 *
 * <pre>
 * レイアウトファイルオプションを指定します
 * </pre>
 *
 * @package Page
 * @author  $Author:$
 * @version SVN: Release: $Id: layout.php 447 2011-06-01 00:31:53Z koriyama@bear-project.net $
 */
class Page_Test_Page_Layout extends App_Page
{
    private $_hasLayoutOption = false;
    /**
     * Inject
     *
     * @return void
     */
    public function onInject()
    {
        $this->_hasLayoutOption = isset($_GET['l']) ? true : false;
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

    /**
     * 表示
     *
     * @return void
     */
    public function onOutput()
    {
        if ($this->_hasLayoutOption === false) {
            $this->display('layout.tpl');
        } else {
            p('layoutオプションを使用中');
            $this->display('layout.tpl', array('layout' => 'test.tpl'));
        }
    }
}

App_Main::run('Page_Test_Page_Layout');