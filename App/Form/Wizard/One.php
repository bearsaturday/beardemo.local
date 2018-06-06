<?php

/**
 * エントリーフォーム
 *
 * Wizardフォーム最初のフォームです。
 * このフォームは2番目、3番目..フォームでも継承され_attrプロパティとして設定しているフォームのアトリビュートは共通して使われます。
 *
 * + UA別インジェクタを使用するとこのアトリビュートが変化します。
 * + hiddenの"click"で次のフォームが指定しページのonAction()で利用しています。
 * + ボタンのレンダリングを変えるため標準の"radio"からBEARオリジナルの"bradio"にしています。
 */
class App_Form_Wizard_One extends BEAR_Base
{
    /**
     * フォームConfig
     *
     * @var array
     */
    protected $_formConfig = [
        'formName' => 'form',
        'callback' => ['App_Form_Wizard_One', 'onRenderFreeze']
    ];

    /**
     * @var HTML_QuickForm
     */
    protected $_form;

    /**
     * アトリビュート
     *
     * @var array
     */
    protected $_attr = [
        'name' => 'size="30" maxlength="30"',
        'email' => 'size="30" maxlength="30"',
        'comment' => 'rows="20" cols="40"']
    ;

    /**
     * フォームテンプレート
     *
     * @var string
     */
    private static $_elementTemplate = "\n\t\t<li><label class=\"element\"><!-- BEGIN required --><span class=\"required\">*</span><!-- END required -->{label}</label><div class=\"element<!-- BEGIN error -->_error<!-- END error -->\">{element}<!-- BEGIN error --><span class=\"form-element-error\" alt=\"!\"><img src=\"/image/warning.gif\"><!-- END error --></div></li>";

    public function onInject()
    {
        $this->_form = BEAR::factory('BEAR_Form', $this->_formConfig);
        $this->_form->addElement('header', 'main', 'Wizard One');
        $this->_form->addElement('hidden', '_click', 'two');
    }

    /**
     * フォーム
     */
    public function buildOne()
    {
        // エレメント
        $this->_form->addElement('text', 'name', '名前', $this->_attr['name']);
        $radio[] = (new HTML_QuickForm)->createElement('bradio', null, null, '男性', 'M');
        $radio[] = (new HTML_QuickForm)->createElement('bradio', null, null, '女性', 'F');
        $this->_form->addGroup($radio, 'gender', '性別');
        // ルール
        $this->_form->addRule('name', '名前を入力してください', 'required');
        $this->_form->addRule('gender', '性別を入力してください', 'required');

        return $this;
    }

    public function button()
    {
        $this->_form->addElement('submit', '_submit', '次へ', '');
    }

    /**
     * カスタムテンプレート
     *
     * @see http://pear.php.net/manual/ja/package.html.html-quickform-renderer-tableless.php
     */
    public static function onRenderFreeze(HTML_QuickForm_Renderer_Tableless $render)
    {
        $render->setElementTemplate(self::$_elementTemplate);
    }
}
