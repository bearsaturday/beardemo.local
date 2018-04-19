<?php
/**
 * This file is part of the beardemo.local package.
 *
 * @license http://opensource.org/licenses/bsd-license.php BSD
 */

/**
 * Multi form
 *
 * ID/Passwordが必要なログインフォームとパスワード通知用のメールアドレスを
 * 入力する２つのフォームを作成します。
 */
class App_Form_Multi extends BEAR_Base
{
    /**
     * ログインフォーム
     *
     * @var array
     */
    private $_login = array();

    /**
     * リマインダーフォーム
     *
     * @var array
     */
    private $_reminder = array();

    /**
     * Inject
     */
    public function onInject()
    {
        $this->_login = array('formName' => 'login');
        $this->_reminder = array('formName' => 'reminder');
    }

    /**
     * build form
     */
    public function build()
    {
        $login = BEAR::dependency('BEAR_Form', $this->_login, false);
        //ログインフォーム
        $login->addElement('header', 'main', 'ログイン');
        $login->addElement('text', 'id', 'ID', 'size=15');
        $login->addElement('text', 'password', 'パスワード', 'size=15');
        $login->addElement('submit', '_submit', 'ログイン', '');
        $login->addRule('id', 'IDを入力してください', 'required', null, '');
        $login->addRule('password', 'passwordを入力してください', 'required', null, '');
        $login->applyFilter('__ALL__', 'trim');
        // 確認フォーム
        $reminder = BEAR::dependency('BEAR_Form', $this->_reminder, false);
        $reminder->addElement('header', 'main', 'パスワードを指定のアドレスに送信します');
        $reminder->addElement('text', 'email', 'メールアドレス', 'size=30');
        $reminder->addElement('submit', '_submit', '確認メールアドレス送信', '');
        $reminder->addRule('email', '入力してください', 'required', null, '');
        $reminder->addRule('email', 'emailアドレスを入力してください', 'email', null, '');
        $reminder->applyFilter('__ALL__', 'trim');
    }
}
