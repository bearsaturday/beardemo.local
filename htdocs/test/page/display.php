<?php
/**
 * bear.demo
 *
 * @package Page
 */
require_once 'App.php';

/**
 * BEAR_Page::display()テスト
 *
 * <pre>
 * テンプレートを相対パスと絶対パスで正しいテンプレートが表示されるかのテストです。
 * /で始まればApp/view/page/から
 * そうでなければページクラスに該当するところからの相対パス指定です。
 * </pre>
 *
 * @package Page
 * @author  $Author:$
 * @version SVN: Release: $Id:$
 */
class Page_Test_Page_Display extends App_Page
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
        $this->display('/hello.tpl');
        $this->display('/hello/hello.tpl');
        $this->display('/hello/hello/hello.tpl');
        $this->display('hello.tpl');
        $this->display('hello/hello.tpl');
        $this->display('hello/hello/hello.tpl');
    }
}

App_Main::run('Page_Test_Page_Display');