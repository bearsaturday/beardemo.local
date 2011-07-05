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
 * DBインサートページ
 *
 * フォームから入力されたデータをDBに格納します。
 * ページをリダイレクトするためにPage Headerサービスをインジェクトしています。
 *
 * @category   BEAR
 * @package    bear.demo
 * @subpackage Page
 * @author     $Author:$ <username@example.com>
 * @license    @license@ http://@license_url@
 * @version    Release: @package_version@ $Id:$
 * @link       http://@link_url@
 */
class Page_Db_Insert_Index extends App_Page
{
    /**
     * Inject
     *
     * @return void
     */
    public function onInject()
    {
        parent::onInject();
        $this->_header = BEAR::dependency('BEAR_Page_Header');
    }

    /**
     * Init
     *
     * @return void
     */
    public function onInit(array $args)
    {
        BEAR::dependency('App_Form_Blog_Entry')->build();
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
        // POE(Post Once Exactly)で一度しか実行しない
        $params = array('uri' => 'Entry', 'values' => $submit, 'options' => array('poe' => true));
        $this->_resource->create($params)->request();
        $this->set('submit', $submit);
        $options = array('click' => 'done');
        $this->_header->redirect('.', $options);
    }

    /**
     * Exception
     *
     * @return void
     */
    public function onException(Exception $e)
    {
        $options = array('click' => 'error', 'val' => array());
        $this->_header->redirect('.', $options);
    }

    /**
     * Action画面
     *
     * Actionアクション実行後に表示されます。
     *
     * @return void
     */
    public function onClickDone(array $args)
    {
        $this->display('done.tpl');
        $this->end();
    }
}

App_Main::run('Page_Db_Insert_Index');