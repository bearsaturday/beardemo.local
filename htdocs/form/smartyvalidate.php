<?php
/**
 * App
 *
 * @category   BEAR
 * @package    @app@
 * @subpackage Page
 * @author     akihito <username@example.com>
 * @license    @license@ http://@license_url@
 * @version    Release: @package_version@ $Id:$
 * @link       http://@link_url@
 */

require_once 'App.php';

/**
 * Form without BEAR_Form(Quickform)
 *
 * @category   BEAR
 * @package    @app@
 * @subpackage Page
 * @author     akihito <username@example.com>
 * @license    @license@ http://@license_url@
 * @version    Release: @package_version@ $Id:$
 * @link       http://@link_url@
 */
class Page_Form_SmartyValidate extends App_Page
{
    /**
     * Inject
     *
     * @return void
     */
    public function onInject()
    {
        $this->_form = BEAR::dependency('App_Form_SmartyValidate');
    }

    /**
     * Init
     *
     * @return void
     */
    public function onInit(array $args)
    {
        $this->_form->build();
    }

    /**
     * Output
     *
     * @return void
     */
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