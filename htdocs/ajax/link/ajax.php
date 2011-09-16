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
     * Run 1 - HTML
     *
     * @param array $args
     *
     * @return void
     */
    public function onClickHtml(array $args)
    {
        $this->_ajax->addAjax(
            'html',array('msg' => 'AJAXリクエスト成功!'),
            array('effect' => 'show')
        );
    }

    /**
     * Run 3 - Val
     *
     * @param array $args
     *
     * @return void
     */
    public function onClickVal(array $args)
    {
        $this->_ajax->addAjax(
            'val',
            array('name' => 'チャーリー・チャップリン',
                'gender' => 'male',
                'blood' => 'O',
                'comment' => '人生はクローズアップで見れば悲劇。ロングショットで見れば喜劇。'
            )
        );
    }

    /**
     * Run 4 - 値を読む
     *
     * @param array $args
     *
     * @return void
     */
    public function onClickRead(array $args)
    {
        $this->_ajax->addAjax(
            'html',
            array('msg' => 'クライアントのデータは常に送られます'),
            array('effect' => 'show')
        );
        /** @param $ajax BEAR_Page_Ajax */
        $ajaxReq = $this->_ajax->getAjaxRequest();
        $args = '<pre>' . print_r($ajaxReq, true) . '</pre>';
        $this->_ajax->addAjax(
            'html',
            array('args' => $args),
            array('effect' => 'show')
        );
    }

    /**
     * Run 5 - JSをコール
     *
     * @param array $args
     *
     * @return void
     */
    public function onClickJs(array $args)
    {
        $this->_ajax->addAjax(
            'js',
            array('demo' => '#bearlogo')
        );
    }

    /**
     * Aタグ意外にはりつけ
     *
     * @param array $args
     *
     * @return void
     */
    public function onClickImg(array $args)
    {
         $this->_ajax->addAjax(
             'html',
             array('img_msg' => 'AJAX OK!'),
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