<?php
/**
 * This file is part of the beardemo.local package.
 *
 * @license http://opensource.org/licenses/bsd-license.php BSD
 */
require_once 'App.php';

/**
 * AJAX Formページ
 */
class Page_Ajax_Form_Index extends App_Page
{
    public function onInject()
    {
        parent::onInject();
        $this->_ajax = BEAR::dependency('BEAR_Page_Ajax');
    }

    public function onInit(array $args)
    {
        BEAR::dependency('App_Form_Ajax')->build();
    }

    public function onOutput()
    {
        $this->display();
    }

    public function onAction(array $submit)
    {
        $this->_ajax->addAjax(
            'html',
            array('msg' => 'okです!')
        );
        $this->output('ajax');
        exit();
    }
}

BEAR_Main::run('Page_Ajax_Form_Index');
