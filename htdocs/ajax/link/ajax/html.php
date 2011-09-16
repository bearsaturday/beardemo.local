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
 * HTML
 *
 * htmlコマンドを返します。受け取ったJSは指定のIDにコンテンツを差し込みます。
 *
 * @category   BEAR
 * @package    bear.demo
 * @subpackage Page
 * @author     $Author:$ <username@example.com>
 * @license    @license@ http://@license_url@
 * @version    Release: @package_version@ $Id:$
 * @link       http://@link_url@
 */
class Page_Ajax_Basic_Ajax_Html extends App_Page
{
    /**
     * Inject
     *
     * @return void
     */
    public function onInject()
    {
        $this->_ajax = BEAR::dependency('BEAR_Page_Ajax');
    }

    /**
     * Init
     *
     * @param array $args
     *
     * @return void
     */
    public function onInit(array $args)
    {
    }

    /**
     * Output
     *
     * @return void
     */
    public function onOutput()
    {
        $this->_ajax->addAjax(
            'html',
            array(
            'msg' => 'AJAXリクエスト成功!',
            'time' => date('r')), array('effect' => 'show')
        );
        $this->output('ajax');
    }
}

BEAR_Main::run('Page_Ajax_Basic_Ajax_Html');