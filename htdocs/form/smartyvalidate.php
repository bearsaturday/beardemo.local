<?php

require_once 'App.php';

/**
 * Form without BEAR_Form(Quickform)
 */
class Page_Form_SmartyValidate extends App_Page
{
    /**
     * @var App_Form_SmartyValidate
     */
    private $_form;

    public function onInject()
    {
        $this->_form = BEAR::dependency('App_Form_SmartyValidate');
    }

    public function onInit(array $args)
    {
        $this->_form->build();
    }

    public function onOutput()
    {
        if ($this->_form->validate()) {
            $submit = $this->_form->exportValues();
            $this->onAction($submit);
        } else {
            $this->display('smartyvalidate/index.tpl');
        }
    }

    public function onAction(array $submit)
    {
        $this->set('submit', print_r($submit, true));
        $this->display('smartyvalidate/action.tpl');
    }
}

App_Main::run('Page_Form_SmartyValidate');
