<?php

/**
 * Wizardフォーム 2
 *
 * 2番目のフォームです。
 */
class App_Form_Wizard_Two extends App_Form_Wizard_One
{
    public function onInject()
    {
        /** @var HTML_QuickForm $form */
        $form = BEAR::factory('BEAR_Form', $this->_formConfig);
        $form->addElement('header', 'main', 'Wizard Two');
        $form->addElement('hidden', '_click', 'three');
        $this->_form = $form;
    }

    /**
     * フォーム
     */
    public function buildTwo() : self
    {
        // エレメント
        $this->_form->addElement('text', 'email', 'メールアドレス', $this->_attr['email']);
        $areaCode = (new HTML_QuickForm)->createElement('text', '', null, ['size' => 3, 'maxlength' => 3]);
        $phoneNo1 = (new HTML_QuickForm)->createElement('text', '', null, ['size' => 4, 'maxlength' => 4]);
        $phoneNo2 = (new HTML_QuickForm)->createElement('text', '', null, ['size' => 4, 'maxlength' => 4]);
        $this->_form->addGroup([$areaCode, $phoneNo1, $phoneNo2], 'tel', '電話番号:', '-');
        // ルール
        $this->_form->addRule('email', 'emailを入力してください', 'required', null);
        $this->_form->addRule('email', 'emailの形式で入力してください', 'email', null);

        return $this;
    }

    public function button()
    {
        $this->_form->addElement('submit', '_submit', '次へ', '');
    }
}
