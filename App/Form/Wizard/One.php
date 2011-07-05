<?php
/**
 * App
 *
 * @category   BEAR
 * @package    bear.demo
 * @subpackage Form
 * @author     $Author:$ <username@example.com>
 * @license    @license@ http://@license_url@
 * @version    Release: @package_version@ $Id: One.php 447 2011-06-01 00:31:53Z koriyama@bear-project.net $
 * @link       http://@link_url@
 */

/**
 * エントリーフォーム
 *
 * <pre>
 * Wizardフォーム最初のフォームです。
 * このフォームは2番目、3番目..フォームでも継承され
 * _attrプロパティとして設定しているフォームのアトリビュートは共通して使われます。
 * UA別インジェクタを使用するとこのアトリビュートが変化します。
 * hiddenの"click"で次のフォームが指定しページのonAction()で利用しています。
 * ボタンのレンダリングを変えるため標準の"radio"からBEARオリジナルの
 * "bradio"にしています。
 * </pre>
 *
 * @category   BEAR
 * @package    bear.demo
 * @subpackage Form
 * @author     $Author:$ <username@example.com>
 * @license    @license@ http://@license_url@
 * @version    Release: @package_version@ $Id: One.php 447 2011-06-01 00:31:53Z koriyama@bear-project.net $
 * @link       http://@link_url@
 */
class App_Form_Wizard_One extends BEAR_Base
{

    /**
     * フォーム
     *
     * @var unknown_type
     */
    protected $_form = array('formName' => 'form', 'callback' => array('App_Form_Wizard_One', 'onRenderFreeze'));

    /**
     * アトリビュート
     *
     * @var array
     */
    protected $_attr = array('name' => 'size="30" maxlength="30"',
    'email' => 'size="30" maxlength="30"', 'comment' => 'rows="20" cols="40"');

    /**
     * テンプレート
     *
     * @var string
     */
    private static $_elementTemplate
        = "\n\t\t<li><label class=\"element\"><!-- BEGIN required --><span class=\"required\">*</span><!-- END required -->{label}</label><div class=\"element<!-- BEGIN error -->_error<!-- END error -->\">{element}<!-- BEGIN error --><span class=\"form-element-error\" alt=\"!\"><img src=\"/image/warning.gif\"><!-- END error --></div></li>";

    /**
     * Inject
     *
     * @return void
     */
    public function onInject()
    {
        $this->_form = BEAR::factory('BEAR_Form', $this->_form);
        $this->_form->addElement('header', 'main', 'Wizard One');
        $this->_form->addElement('hidden', '_click', 'two');
    }

    /**
     * フォーム
     *
     * @return App_Form_Wizard_One
     */
    public function buildOne()
    {
        // エレメント
        $this->_form->addElement('text', 'name', '名前', $this->_attr['name']);
        $radio[] = &HTML_QuickForm::createElement('bradio', null, null, '男性', 'M');
        $radio[] = &HTML_QuickForm::createElement('bradio', null, null, '女性', 'F');
        $this->_form->addGroup($radio, 'gender', '性別');
        // ルール
        $this->_form->addRule('name', '名前を入力してください', 'required');
        $this->_form->addRule('gender', '性別を入力してください', 'required');
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
    /**
     * カスタムテンプレート
     *
     * @param HTML_QuickForm_Renderer_Tableless $render
     *
     * @return void
     * @see    http://pear.php.net/manual/ja/package.html.html-quickform-renderer-tableless.php
     */
    public static function onRenderFreeze(HTML_QuickForm_Renderer_Tableless $render)
    {
        $render->setElementTemplate(self::$_elementTemplate);
    }
}