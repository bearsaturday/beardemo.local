<?php
/**
 * App
 *
 * @category   BEAR
 * @package    bear.demo
 * @subpackage Form
 * @author     $Author:$ <username@example.com>
 * @license    @license@ http://@license_url@
 * @version    Release: @package_version@ $Id: Preview.php 447 2011-06-01 00:31:53Z koriyama@bear-project.net $
 * @link       http://@link_url@
 */

/**
 * Wizardフォーム プレビュー
 *
 * 確認用フォームです。エレメントはfreezeしてて入力はできません。
 *
 * @category   BEAR
 * @package    bear.demo
 * @subpackage Form
 * @author     $Author:$ <username@example.com>
 * @license    @license@ http://@license_url@
 * @version    Release: @package_version@ $Id: Preview.php 447 2011-06-01 00:31:53Z koriyama@bear-project.net $
 * @link       http://@link_url@
 */
class App_Form_Wizard_Preview extends App_Form_Wizard_Three
{
    /**
     * Inject
     *
     * @return void
     * @throws App_Session_Exception セッションタイムアウトの時の例外
     */
    public function onInject()
    {
        $this->_form = array('formName' => 'form', 'callback' => array(__CLASS__, 'onRenderFreeze'));
        $this->_form = BEAR::factory('BEAR_Form', $this->_form);
        $this->_form->addElement('header', 'main', '確認画面');
        $this->_form->addElement('hidden', '_click', 'action');
        $sessionSubmit = BEAR::dependency('BEAR_Session_Session')->get('wizard_submit');
        unset($sessionSubmit['_click']);
        if (!$sessionSubmit) {
            throw new App_Session_Exception('Session Timeout');
        }
        $this->_form->setDefaults($sessionSubmit);
        $this->_form->freeze();
    }

    /**
     * ボタン
     *
     * @return void
     */
    public function button()
    {
        //ボタン
        $buttons[] = HTML_QuickForm::createElement('submit', '_submit', '送信', '');
        $buttons[] = HTML_QuickForm::createElement('link', '_cancel', '/form/wizar', '',  'Cancel (最初に戻る)');
        $this->_form->addGroup($buttons, null, null, '&nbsp;');
    }
}