<?php
/**
 * This file is part of the beardemo.local package.
 *
 * @license http://opensource.org/licenses/bsd-license.php BSD
 */

/**
 * Simpleフォーム
 *
 * モバイル用のフォームのためにonInjectMobile()が用意されています。
 * フォームのレンダリングのコールバックオプションを指定しています。
 *
 */
class App_Form_Simple extends BEAR_Base
{
    /**
     * テンプレート
     *
     * @var string
     */
    private static $_elementTemplate = "\n\t\t<li><label class=\"element\"><!-- BEGIN required --><span class=\"required\">*</span><!-- END required -->{label}</label><div class=\"element<!-- BEGIN error -->_error<!-- END error -->\">{element}<!-- BEGIN error --><span class=\"error\">!</span><!-- END error --><!-- BEGIN label_3 -->{label_3}<!-- END label_3 --><!-- BEGIN label_2 --><br /><span style=\"font-size: 80%;\">{label_2}</span><!-- END label_2 --></div></li>";

    /**
     * アトリビュート
     *
     * @var array
     */
    private $_attr = array('name' => 'size="30" maxlength="30"',  'email' => 'size="30" maxlength="30"', 'body' => 'rows="8" cols="40"');

    /**
     * フォーム
     *
     * @var unknown_type
     */
    private $_form = array('formName' => 'form', 'callback' => array(__CLASS__, 'onRender'));

    /**
     * Inject
     */
    public function onInject()
    {
    }

    /**
     * モバイルインジェクト
     */
    public function onInjectMobile()
    {
        self::$_elementTemplate = "\n\t\t<li><label class=\"element\"><!-- BEGIN required --><span class=\"required\">*</span><!-- END required -->{label}</label><div class=\"element<!-- BEGIN error -->_error<!-- END error -->\">{element}<!-- BEGIN error --><span class=\"error\">!</span><!-- END error --><!-- BEGIN label_3 -->{label_3}<!-- END label_3 --><!-- BEGIN label_2 --><br /><span style=\"font-size: 80%;\">{label_2}</span><!-- END label_2 --></div></li>";
        $this->onInject();
    }

    /**
     * フォーム
     */
    public function build()
    {
        $form = BEAR::factory('BEAR_Form', $this->_form);
        // デフォルト
        $form->setDefaults(array('name' => 'Kuma' . (string) mt_rand(1, 10), 'email' => 'kuma@example.com'));
        // ヘッダー
        $form->addElement('header', 'main', 'Simple Form');
        // フィールド
        $form->addElement('text', 'name', '名前', $this->_attr['name']);
        $form->addElement('text', 'email', 'メールアドレス', $this->_attr['email']);
        $form->addElement('textarea', 'body', '本文', $this->_attr['body']);
        $form->addElement('submit', '_submit', '送信', '');
        // フィルタと検証ルール
        $form->applyFilter('__ALL__', 'trim');
        $form->applyFilter('__ALL__', 'strip_tags');
        $form->addRule('name', '名前を入力してください', 'required');
        $form->addRule('email', 'emailを入力してください', 'required', null, 'client');
        $form->addRule('email', 'emailの形式で入力してください', 'email', null, 'client');
    }

    /**
     * カスタムテンプレート
     *
     * @param HTML_QuickForm_Renderer_Tableless $render
     *
     * @see    http://pear.php.net/manual/ja/package.html.html-quickform-renderer-tableless.php
     */
    public static function onRender(HTML_QuickForm_Renderer_Tableless $render)
    {
        $render->setElementTemplate(self::$_elementTemplate);
    }
}
