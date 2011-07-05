<?php
/**
 * App
 *
 * @category   BEAR
 * @package    bear.demo
 * @subpackage Form
 * @author     $Author:$ <username@example.com>
 * @license    @license@ http://@license_url@
 * @version    Release: @package_version@ $Id: Two.php 447 2011-06-01 00:31:53Z koriyama@bear-project.net $
 * @link       http://@link_url@
 */

/**
 * Wizardフォーム 2
 *
 * 2番目のフォームです。
 *
 * @category   BEAR
 * @package    bear.demo
 * @subpackage Form
 * @author     $Author:$ <username@example.com>
 * @license    @license@ http://@license_url@
 * @version    Release: @package_version@ $Id: Two.php 447 2011-06-01 00:31:53Z koriyama@bear-project.net $
 * @link       http://@link_url@
 */
class App_Form_Wizard_Two extends App_Form_Wizard_One
{
    /**
     * Inject
     *
     * @return void
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
        $this->_form->addElement('text', 'email', 'メールアドレス',  $this->_attr['email']);
        $areaCode = &HTML_QuickForm::createElement('text', '', null, array('size' => 3, 'maxlength' => 3));
        $phoneNo1 = &HTML_QuickForm::createElement('text', '', null, array('size' => 4, 'maxlength' => 4));
        $phoneNo2 = &HTML_QuickForm::createElement('text', '', null, array('size' => 4, 'maxlength' => 4));
        $this->_form->addGroup(array($areaCode, $phoneNo1, $phoneNo2), 'tel', '電話番号:', '-');
        // ルール
        $this->_form->addRule('email', 'emailを入力してください', 'required', null);
        $this->_form->addRule('email', 'emailの形式で入力してください', 'email', null);
        return $this;
    }

    /**
     * ボタン
     *
     * @return void
     */
    public function button()
    {
        //ボタン
        $this->_form->addElement('submit', '_submit', '次へ', '');
    }
}