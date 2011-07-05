    <?php
/**
 * App
 *
 * @category   BEAR
 * @package    bear.demo
 * @subpackage Form
 * @author     $Author:$ <username@example.com>
 * @license    @license@ http://@license_url@
 * @version    Release: @package_version@ $Id: Three.php 447 2011-06-01 00:31:53Z koriyama@bear-project.net $
 * @link       http://@link_url@
 */

/**
 * Wizardフォーム 3
 *
 * 3番目のフォームです。
 *
 * @category   BEAR
 * @package    bear.demo
 * @subpackage Form
 * @author     $Author:$ <username@example.com>
 * @license    @license@ http://@license_url@
 * @version    Release: @package_version@ $Id: Three.php 447 2011-06-01 00:31:53Z koriyama@bear-project.net $
 * @link       http://@link_url@
 */
class App_Form_Wizard_Three extends App_Form_Wizard_Two
{

    /**
     * Inject
     *
     * @return void
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
        $this->_form->addElement('textarea', 'comment', 'コメント',  $this->_attr['comment']);
        $this->_form->addRule('comment', 'コメントを入力してください', 'required', null);
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
        $this->_form->addElement('submit', '_submit', '確認画面へ...', '');
    }
}