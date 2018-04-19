<?php

require_once 'App.php';

/**
 * Pamda エラーテスト
 */
class Page_Test_Error_Panda extends App_Page
{
    public function onInit(array $args)
    {
        echo $a;
        echo 1 / 0;
    }

    public function onOutput()
    {
        echo '<hr><h1>Pandaエラーテスト終了</h1>';
        echo '<p>FireBug + FirePHPでnoticeとwarningが出てるか確認してください。</p>';
    }

    private function nonStaticFunction()
    {
    }
}

App_Main::run('Page_Test_Error_Panda');
