<?php

require_once 'App.php';

/**
 * DBインサートページ
 *
 * フォームから入力されたデータをDBに格納します。
 * ページをリダイレクトするためにPage Headerサービスをインジェクトしています。
 */
class Page_Db_Insert_Index extends App_Page
{
    /**
     * @var BEAR_Page_Header
     */
    private $_header;

    public function onInject()
    {
        parent::onInject();
        $this->_header = BEAR::dependency('BEAR_Page_Header');
    }

    public function onInit(array $args)
    {
        BEAR::dependency('App_Form_Blog_Entry')->build();
    }

    public function onOutput()
    {
        $this->display();
    }

    public function onAction(array $submit)
    {
        // POE(Post Once Exactly)で一度しか実行しない
        $params = array('uri' => 'Entry', 'values' => $submit, 'options' => array('poe' => true));
        $this->_resource->create($params)->request();
        $this->set('submit', $submit);
        $options = array('click' => 'done');
        $this->_header->redirect('.', $options);
    }

    public function onException(Exception $e)
    {
        $options = array('click' => 'error', 'val' => array());
        $this->_header->redirect('.', $options);
    }

    /**
     * Action画面
     *
     * Actionアクション実行後に表示されます。
     */
    public function onClickDone(array $args)
    {
        $this->display('done.tpl');
        $this->end();
    }
}

App_Main::run('Page_Db_Insert_Index');
