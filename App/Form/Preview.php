<?php


/**
 * Previewフォーム
 *
 * 表示、確認、修正の３つの状態のある確認画面つきフォームです。
 */
class App_Form_Preview extends BEAR_Base
{
    /**
     * フォームテンプレート
     *
     * @var string
     */
    private static $_elementTemplateFreeze = "\n\t\t<li><label class=\"element\"><!-- BEGIN required --><span class=\"required\">*</span><!-- END required -->{label}</label><div class=\"element<!-- BEGIN error -->_error<!-- END error -->\">{element}<!-- BEGIN error --><span class=\"form-element-error\" alt=\"!\"><img src=\"/image/warning.gif\"><!-- END error --></div></li>";

    /**
     * フォーム
     *
     * @var HTML_QuickForm
     */
    private $_form ;

    /**
     * アトリビュート
     *
     * @var array
     */
    private $_attr = [
        'name' => 'size="30" maxlength="30"',
        'email' => 'size="30" maxlength="30"',
        'body' => 'rows="8" cols="40"'
    ];

    /**
     * フリーズしたときに変更するセレクトボックスセパレータ
     *
     * @var array
     */
    private $_separator = ['&nbsp;', '<br />'];

    /*
     * デフォルト
     *
     * @var mixed
     */
    private $_defaults = null;

    /**
     * Inject（PC）
     */
    public function onInject()
    {
        $this->_form = BEAR::factory('BEAR_Form');
    }

    /**
     * Inject（携帯）
     */
    public function onInjectMobile()
    {
        $this->_attr = [
            'name' => 'size="12" maxlength="30"',
            'email' => 'size="12" maxlength="30"',
            'body' => 'rows="8" cols="20"'
        ];
    }

    public function build(string $formMode)
    {
        $this->_injectFormMode($formMode);
        // デフォルト
        if ($this->_defaults) {
            $this->_form->setDefaults($this->_defaults);
        }
        // ヘッダー
        $this->_form->addElement('header', 'main', 'Preview Form');
        // フィールド
        $this->_form->addElement('text', 'name', '名前', $this->_attr['name']);
        $this->_form->addElement('text', 'email', 'メールアドレス', $this->_attr['email']);
        $this->_form->addElement('textarea', 'body', '本文', $this->_attr['body']);
        // Creates a checkboxes group using an array of separators
        $checkbox = [];
        $checkbox[] = (new HTML_QuickForm)->createElement('bcheckbox', 'travel', null, '旅行');
        $checkbox[] = (new HTML_QuickForm)->createElement('bcheckbox', 'photo', null, '写真');
        $checkbox[] = (new HTML_QuickForm)->createElement('bcheckbox', 'music', null, '音楽');
        $checkbox[] = (new HTML_QuickForm)->createElement('bcheckbox', 'movie', null, '映画');
        $this->_form->addGroup(
            $checkbox,
            'hobby',
            ['趣味:', '最低２つ入力してください'],
            $this->_separator
        );
        // ラジオボタン
        $radio = [];
        $radio[] =  (new HTML_QuickForm)->createElement('bradio', null, null, 'Yes', 'y');
        $radio[] =  (new HTML_QuickForm)->createElement('bradio', null, null, 'No', 'n');
        $this->_form->addGroup($radio, 'yesorno', 'Yes/No:');
        // フィルタと検証ルール
        $this->_form->applyFilter('__ALL__', 'trim');
        $this->_form->applyFilter('__ALL__', 'strip_tags');
        $this->_form->addRule('name', '名前を入力してください', 'required', null);
        $this->_form->addRule('email', 'emailを入力してください', 'required', null);
        $this->_form->addRule('email', 'emailの形式で入力してください', 'email', null);
        // グループルール
        $this->_form->addGroupRule('hobby', '趣味を最低２つ入力してください', 'required', null, 2);
    }

    /**
     * 最初の画面のボタン
     */
    public function buildConfirmButton()
    {
        $this->_form->addElement('submit', '_freeze', '確認...', '');
    }

    /**
     * 確認画面のボタン
     */
    public function buildSendButton()
    {
        $buttons = [];
        $buttons[] = $this->_form->createElement('submit', '_action', '送信', '');
        $buttons[] = $this->_form->createElement('submit', '_modify', '修正', '');
        $this->_form->addGroup($buttons);
        $this->_form->freeze();
    }

    /**
     * カスタムテンプレート
     */
    public static function onRenderFreeze(HTML_QuickForm_Renderer_Tableless $render)
    {
        $render->setElementTemplate(self::$_elementTemplateFreeze);
    }

    /**
     * Inject　- フリーズ
     */
    private function _injectPreview()
    {
        $this->_form = ['formName' => 'form', 'callback' => [__CLASS__, 'onRenderFreeze']];
        $this->_separator = '&nbsp;';
    }

    /**
     * Inject - 修正
     */
    private function _injectModify()
    {
        $this->_defaults = $_POST;
    }

    /**
     * フォームの状態をセット
     *
     * フォームの状態を通常、確認（フリーズ）、修正にセットします
     *
     * @param string $formMode
     */
    private function _injectFormMode($formMode)
    {
        switch ($formMode) {
            case 'default':
                break;
            case 'preview':
                $this->_separator = '&nbsp;';
                $this->_injectPreview();
                break;
            case 'modify':
                $this->_defaults = $_POST;
                $this->_injectModify();
                break;
            default:
                break;
        }
    }
}
