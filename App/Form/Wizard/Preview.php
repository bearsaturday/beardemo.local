<?php


/**
 * Wizardフォーム プレビュー
 *
 * 確認用フォームです。エレメントはfreezeしてて入力はできません。
 */
class App_Form_Wizard_Preview extends App_Form_Wizard_Three
{
    /**
     * Inject
     *
     * @throws App_Session_Exception セッションタイムアウトの時の例外
     */
    public function onInject()
    {
        $this->_form = ['formName' => 'form', 'callback' => [__CLASS__, 'onRenderFreeze']];
        $this->_form = BEAR::factory('BEAR_Form', $this->_form);
        $this->_form->addElement('header', 'main', '確認画面');
        $this->_form->addElement('hidden', '_click', 'action');
        $sessionSubmit = BEAR::dependency('BEAR_Session')->get('wizard_submit');
        unset($sessionSubmit['_click']);
        if (! $sessionSubmit) {
            throw new App_Session_Exception('Session Timeout');
        }
        $this->_form->setDefaults($sessionSubmit);
        $this->_form->freeze();
    }

    /**
     * ボタン
     */
    public function button()
    {
        //ボタン
        $buttons[] = (new HTML_QuickForm)->createElement('submit', '_submit', '送信', '');
        $buttons[] = (new HTML_QuickForm)->createElement('link', '_cancel', '/form/wizar', '', 'Cancel (最初に戻る)');
        $this->_form->addGroup($buttons, null, null, '&nbsp;');
    }
}
