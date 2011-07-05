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
 * マルチフォーム
 *
 * <pre>
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
 * </pre>
 *
 * @category   BEAR
 * @package    bear.demo
 * @subpackage Page
 * @author     $Author:$ <username@example.com>
 * @license    @license@ http://@license_url@
 * @version    Release: @package_version@ $Id:$
 * @link       http://@link_url@
 */
class Page_Form_Multi_Index extends App_Page
{

    /**
     * Inject
     *
     * @return void
     */
    public function onInject()
    {
        parent::onInject();
    }

    /**
     * Init
     *
     * @return void
     */
    public function onInit(array $args)
    {
        BEAR::dependency('App_Form_Multi')->build();
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
     * ログインアクション
     *
     * @return void
     */
    public function onActionLogin(array $submit)
    {
        echo '<p>onActionLoginがコールされました　$submitは' . var_export($submit, true) . '</p>';
    }

    /**
     * Action
     *
     * @return void
     */
    public function onAction(array $submit)
    {
        echo '<p>onActionがコールされました　$submitは' . var_export($submit, true) . '</p>';
    }
}

App_Main::run('Page_Form_Multi_Index');
