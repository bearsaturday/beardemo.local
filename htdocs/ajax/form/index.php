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
 * AJAX Formページ
 *
 * @category   BEAR
 * @package    bear.demo
 * @subpackage Page
 * @author     $Author:$ <username@example.com>
 * @license    @license@ http://@license_url@
 * @version    Release: @package_version@ $Id:$
 * @link       http://@link_url@
 */
class Page_Ajax_Form_Index extends App_Page
{
    /**
     *　Inject
     *
     * @return void
     */
    public function onInject()
    {
        parent::onInject();
        $this->_ajax = BEAR::dependency('BEAR_Page_Ajax');
    }

    /**
     * Init
     *
     * @return void
     */
    public function onInit(array $args)
    {
        BEAR::dependency('App_Form_Ajax')->build();
    }

    /**
     * Output
     *
     * @return void
     */
    public function onOutput()
    {
        $this->display();
    }

    /**
     * Action
     *
     * @param array $submit サブミット値
     *
     * @return void
     */
    public function onAction(array $submit)
    {
        $this->_ajax->addAjax(
            'html',
            array('msg' => "okです!")
        );
        $this->output('ajax');
        exit();
    }
}

BEAR_Main::run('Page_Ajax_Form_Index');