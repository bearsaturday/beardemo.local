<?php
/**
 * App
 *
 * @category   BEAR
 * @package    bear.demo
 * @subpackage Page
 * @author     $Author:$ <username@example.com>
 * @license    @license@ http://@license_url@
 * @version    Release: @package_version@ $Id:$
 * @link       http://@link_url@
 */

require_once 'App.php';

/**
 * Pamda エラーテスト
 *
 * @category   BEAR
 * @package    bear.demo
 * @subpackage Page
 * @author     $Author:$ <username@example.com>
 * @license    @license@ http://@license_url@
 * @version    Release: @package_version@ $Id:$
 * @link       http://@link_url@
 */
class Page_Test_Error_Panda extends App_Page
{
    /**
     * Init
     *
     * @return void
     */
    public function onInit(array $args)
    {
        echo $a;
        echo 1/0;
    }

    private function nonStaticFunction()
    {
    }

    public function onOutput()
    {
        echo "<hr><h1>Pandaエラーテスト終了</h1>";
        echo "<p>FireBug + FirePHPでnoticeとwarningが出てるか確認してください。</p>";
    }
}

App_Main::run('Page_Test_Error_Panda');