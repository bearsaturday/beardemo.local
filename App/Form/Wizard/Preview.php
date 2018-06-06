<?php

/**
 * Wizardフォーム プレビュー
 *
 * 確認用フォームです。エレメントはfreezeしてて入力はできません。
 */
class App_Form_Wizard_Preview extends App_Form_Wizard_Three
{
    /**
     * @var array
     */
    protected $_formConfig = [
        'formName' => 'form',
        'callback' => [__CLASS__, 'onRenderFreeze']
    ];

    /**
     * @throws App_Session_Exception
     * @throws BEAR_Exception
     */
    public function onInject()
    {
        /** @var HTML_QuickForm $form */
        $form = BEAR::factory('BEAR_Form', $this->_formConfig);
        $form->addElement('header', 'main', '確認画面');
        $form->addElement('hidden', '_click', 'action');
        /** @var BEAR_Session $session */
        $session = BEAR::dependency('BEAR_Session');
        $sessionSubmit = $session->get('wizard_submit');
        unset($sessionSubmit['_click']);
        if (! $sessionSubmit) {
            throw new App_Session_Exception('Session Timeout');
        }
        $form->setDefaults($sessionSubmit);
        $form->freeze();
        $this->_form = $form;
    }

    public function button()
    {
        $buttons = [];
        $buttons[] = (new HTML_QuickForm)->createElement('submit', '_submit', '送信', '');
        $buttons[] = (new HTML_QuickForm)->createElement('link', '_cancel', '/form/wizar', '', 'Cancel (最初に戻る)');
        $this->_form->addGroup($buttons, null, null, '&nbsp;');
    }
}
