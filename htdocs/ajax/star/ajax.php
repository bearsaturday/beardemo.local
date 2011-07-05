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
 * AJAXサービス
 *
 * clickイベントに応じて、返すbear.jsコマンド(JSON)を変えています。
 *
 * @category   BEAR
 * @package    bear.demo
 * @subpackage Page
 * @author     $Author:$ <username@example.com>
 * @license    @license@ http://@license_url@
 * @version    Release: @package_version@ $Id:$
 * @link       http://@link_url@
 */
class Page_Ajax_Link_Ajax extends App_Page
{

    /**
     * Inject
     *
     * @return void
     */
    public function onInject()
    {
        parent::onInject();
        $this->_ajax = BEAR::dependency('BEAR_Page_Ajax');
        $this->injectAjaxRequest();
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
     * レート変更
     *
     * スターによるレートの変更を受け付けます。
     *
     * @param array $args
     *
     * @return void
     */
    public function onClickRate(array $args)
    {
        $rate = $args['click'];
        $this->_ajax->addAjax(
            'html',
            array('hover-tip' => "<b>星[{$rate}]の評価を受け付けました!</b>"),
            array('effect' => 'show')
        );
    }

    /**
     * Output
     *
     * @return void
     */
    public function onOutput()
    {
        $this->output('ajax');
    }
}

BEAR_Main::run('Page_Ajax_Link_Ajax');