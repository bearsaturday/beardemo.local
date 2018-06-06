<?php

require_once 'App.php';

class Page_Ajax_Form_Index extends App_Page
{
    /**
     * @var BEAR_Page_Ajax
     */
    private $_ajax;

    public function onInject()
    {
        $this->_ajax = BEAR::dependency('BEAR_Page_Ajax');
        parent::onInject();
    }

    public function onInit(array $args)
    {
        /** @var App_Form_Ajax $form */
        $form = BEAR::dependency('App_Form_Ajax');
        $form->build();
    }

    public function onOutput()
    {
        $this->display();
    }

    public function onAction(array $submit)
    {
        $this->_ajax->addAjax(
            'html',
            ['msg' => 'okです!']
        );
        $this->output('ajax');
        exit();
    }
}

BEAR_Main::run('Page_Ajax_Form_Index');
