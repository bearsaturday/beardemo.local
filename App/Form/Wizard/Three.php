    <?php
/**
 * App
 *
 * @license    @license@ http://@license_url@
 *
 * @link       http://@link_url@
 */

/**
 * Wizardフォーム 3
 *
 * 3番目のフォームです。
 */
class App_Form_Wizard_Three extends App_Form_Wizard_Two
{
    public function onInject()
    {
        /** @var HTML_QuickForm $form */
        $form = BEAR::factory('BEAR_Form', $this->_formConfig);
        $form->addElement('header', 'main', 'Wizard Three');
        $form->addElement('hidden', '_click', 'preview');
        $this->_form = $form;
    }

    /**
     * フォーム
     */
    public function buildThree() : self
    {
        // フィールド
        $this->_form->addElement('textarea', 'comment', 'コメント', $this->_attr['comment']);
        $this->_form->addRule('comment', 'コメントを入力してください', 'required', null);

        return $this;
    }

    public function button()
    {
        $this->_form->addElement('submit', '_submit', '確認画面へ...', '');
    }
}
