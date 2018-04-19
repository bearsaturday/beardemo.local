<?php
/**
 * This file is part of the beardemo.local package.
 *
 * @license http://opensource.org/licenses/bsd-license.php BSD
 */
require_once 'App.php';

/**
 * マルチフォーム
 *
 * １つのページに２つの別のフォームがあり、サブミットされたフォーム毎の処理を行います。
 * サブミットされたらまずはonAction()がコールされどのフォームにも共通な処理があればここに記述します。
 * その後onActionフォーム名のメソッドが"あれば"コールされます。
 *
 * このページでLoginは専用actionがあり、Reminderはないのでそれぞれ以下のようにコールされます。
 *
 * Login
 * onInit() -> onAction() -> onActionLogin()
 *
 * Reminder
 * onInit() -> onAction()
 */
class Page_Form_Multi_Index extends App_Page
{
    public function onInject()
    {
        parent::onInject();
    }

    public function onInit(array $args)
    {
        BEAR::dependency('App_Form_Multi')->build();
    }

    public function onOutput()
    {
        $this->display();
    }

    /**
     * ログインアクション
     */
    public function onActionLogin(array $submit)
    {
        echo '<p>onActionLoginがコールされました　$submitは' . var_export($submit, true) . '</p>';
    }

    public function onAction(array $submit)
    {
        echo '<p>onActionがコールされました　$submitは' . var_export($submit, true) . '</p>';
    }
}

App_Main::run('Page_Form_Multi_Index');
