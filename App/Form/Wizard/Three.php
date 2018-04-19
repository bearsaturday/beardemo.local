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
    /**
     * Inject
     */
    public function onInject()
    {
        $this->_form = BEAR::factory('BEAR_Form', $this->_form);
        $this->_form->addElement('header', 'main', 'Wizard Three');
        $this->_form->addElement('hidden', '_click', 'preview');
    }

    /**
     * フォーム
     *
     * @return App_Form_Wizard_Three
     */
    public function buildThree()
    {
        // フィールド
        $this->_form->addElement('textarea', 'comment', 'コメント', $this->_attr['comment']);
        $this->_form->addRule('comment', 'コメントを入力してください', 'required', null);

        return $this;
    }

    /**
     * ボタン
     */
    public function button()
    {
        //ボタン
        $this->_form->addElement('submit', '_submit', '確認画面へ...', '');
    }
}
