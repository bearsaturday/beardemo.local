<?php

/**
 * Ajaxフォーム
 */
class App_Form_Ajax extends BEAR_Base
{
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
     * フォーム設定
     *
     * @var array
     */
    private $_form = [
        'formName' => 'form',
        'attributes' => ['rel' => 'ajax']
    ];

    /**
     * Build form
     *
     * @return HTML_QuickForm
     */
    public function build()
    {
        /** @var HTML_QuickForm $form */
        $form = BEAR::factory('BEAR_Form', $this->_form);
        // デフォルト
        $form->setDefaults(['name' => 'Kuma', 'email' => 'kuma@example.com']);
        // ヘッダー
        $form->addElement('header', 'main', 'Simple Form');
        // フィールド
        $form->addElement('text', 'name', '名前', $this->_attr['name']);
        $form->addElement('text', 'email', 'メールアドレス', $this->_attr['email']);
        $form->addElement('textarea', 'body', '本文', $this->_attr['body']);
        $form->addElement('submit', '_submit', 'AJAX送信');
        $form->addElement(
                   'static',
            '_ajax',
            ['リンクサブミット',
                   'このリンクはサブミットボタンと同じように機能します'],
                   '<a href="#" title="サブミット" rel="form">AJAX送信</a>'
        );
        // フィルタと検証ルール
        $form->applyFilter('__ALL__', 'trim');
        $form->applyFilter('__ALL__', 'strip_tags');
        $form->addRule('name', '名前を入力してください', 'required');
        $form->addRule('email', 'emailを入力してください', 'required');
        $form->addRule('email', 'emailの形式で入力してください', 'email');
    }
}
