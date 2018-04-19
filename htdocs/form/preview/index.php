<?php

require_once 'App.php';

/**
 * 確認画面つきフォーム
 *
 * 初期表示フォーム、確認表示フォーム、修正フォームの３種類のフォームの状態をそれぞれの種類のインジェクターでフォームの状態を変えています。
 * 画面は初期（修正）画面、確認画面、送信後画面と３つあります。
 */
class Page_Form_Preview_Index extends App_Page
{
    /**
     * @var App_Form_Preview
     */
    private $_form;

    public function onInject()
    {
        parent::onInject();
        // 押されたボタンでに応じたインジェクターを用意
        if (isset($_POST['_freeze'])) {
            //確認インジェクト
            $formMode = 'preview';
        } elseif (isset($_POST['_modify'])) {
            //修正インジェクト
            $formMode = 'modify';
        } else {
            //初期インジェクト
            $formMode = 'default';
        }
        $this->injectArg('form_mode', $formMode);
        $this->_form = BEAR::dependency('App_Form_Preview');
    }

    public function onInit(array $args)
    {
        $this->_form->build($args['form_mode']);
    }

    public function onOutput()
    {
        $this->_form->buildConfirmButton();
        // 確認画面
        $this->display();
    }

    /**
     * Action
     *
     * $submitにはボタン名は伝わらないので、サブミット値がそのまま入っているBEAR_Form::$submitValueで押されたボタンを判定
     */
    public function onAction(array $submit)
    {
        if (isset(BEAR_Form::$submitValue['_action'])) {
            //送信ボタンがおされてアクション実行
            $this->set('submit', print_r($submit, true));
            $this->display('action.tpl');
        } elseif (isset(BEAR_Form::$submitValue['_modify'])) {
            // 修正ボタンがおされて最初の画面を表示
            $this->_form->buildConfirmButton();
            $this->display();
        } else {
            // 確認...ボタンがおされて確認画面を表示
            $this->_form->buildSendButton();
            $this->display('preview.tpl');
        }
    }
}

App_Main::run('Page_Form_Preview_Index');
