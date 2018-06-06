<?php

require_once 'App.php';

/**
 * DBインサートページ
 *
 * フォームから送信されたデータをDBに格納します。
 */
class Page_Db_Insert_Index extends App_Page
{
    /**
     * @var BEAR_Page_Header
     */
    private $_header;

    /**
     * @var App_Form_Blog_Entry
     */
    private $_form;

    public function onInject()
    {
        $this->_header = BEAR::dependency('BEAR_Page_Header');
        $this->_form = BEAR::dependency('App_Form_Blog_Entry');
        parent::onInject();
    }

    public function onInit(array $args)
    {
        $this->_form->build();
    }

    public function onOutput()
    {
        $this->display();
    }

    public function onAction(array $submit)
    {
        $params = [
            'uri' => 'Entry',
            'values' => $submit,
            'options' => [
                'poe' => true   // POE(Post Once Exactly)で一度しか実行しない
            ]
        ];
        $this->_resource->create($params)->request();
        $this->set('submit', $submit);
        $this->_header->redirect('.', ['click' => 'done']);
    }

    public function onException(Exception $e)
    {
        echo $e;exit;
        $options = ['click' => 'error', 'val' => []];
        $this->_header->redirect('.', $options);
    }

    /**
     * Done画面
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
