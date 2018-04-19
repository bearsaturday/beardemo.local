<?php
/**
 * This file is part of the beardemo.local package.
 *
 * @license http://opensource.org/licenses/bsd-license.php BSD
 */

/**
 * Wizardフォーム 2
 *
 * 2番目のフォームです。
 */
class App_Form_Wizard_Two extends App_Form_Wizard_One
{
    /**
     * Inject
     */
    public function onInject()
    {
        $this->_form = BEAR::factory('BEAR_Form', $this->_form);
        $this->_form->addElement('header', 'main', 'Wizard Two');
        $this->_form->addElement('hidden', '_click', 'three');
    }

    /**
     * フォーム
     *
     * @return App_Form_Wizard_Two
     */
    public function buildTwo()
    {
        // エレメント
        $this->_form->addElement('text', 'email', 'メールアドレス', $this->_attr['email']);
        $areaCode = HTML_QuickForm::createElement('text', '', null, array('size' => 3, 'maxlength' => 3));
        $phoneNo1 = HTML_QuickForm::createElement('text', '', null, array('size' => 4, 'maxlength' => 4));
        $phoneNo2 = HTML_QuickForm::createElement('text', '', null, array('size' => 4, 'maxlength' => 4));
        $this->_form->addGroup(array($areaCode, $phoneNo1, $phoneNo2), 'tel', '電話番号:', '-');
        // ルール
        $this->_form->addRule('email', 'emailを入力してください', 'required', null);
        $this->_form->addRule('email', 'emailの形式で入力してください', 'email', null);

        return $this;
    }

    /**
     * ボタン
     */
    public function button()
    {
        //ボタン
        $this->_form->addElement('submit', '_submit', '次へ', '');
    }
}
