<?php

require_once 'App.php';

/**
 * シンプルフォーム
 */
class Page_Form_Simple_Index extends App_Page
{
    public function onInject()
    {
        parent::onInject();
    }

    public function onInit(array $args)
    {
        BEAR::dependency('App_Form_Simple')->build();
    }

    public function onOutput()
    {
        $this->display();
    }

    public function onAction(array $submit)
    {
        $this->set('submit', print_r($submit, true));
        $this->display('action.tpl');
    }
}
App_Main::run('Page_Form_Simple_Index');
