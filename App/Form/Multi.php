<?php
/**
 * App
 *
 * @category   BEAR
 * @package    bear.demo
 * @subpackage Form
 * @author     $Author:$ <username@example.com>
 * @license    @license@ http://@license_url@
 * @version    Release: @package_version@ $Id:$
 * @link       http://@link_url@
 */

/**
 * Multi form
 *
 * ID/Passwordが必要なログインフォームとパスワード通知用のメールアドレスを
 * 入力する２つのフォームを作成します。
 *
 * @category   BEAR
 * @package    bear.demo
 * @subpackage Form
 * @author     $Author:$ <username@example.com>
 * @license    @license@ http://@license_url@
 * @version    Release: @package_version@ $Id:$
 * @link       http://@link_url@
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
     *
     * @return void
     */
    public function onInject()
    {
        $this->_login = array('formName' => 'login');
        $this->_reminder = array('formName' => 'reminder');
    }

    /**
     * build form
     *
     * @return void
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