<?php

require_once 'App.php';

/**
 * Ajax Form
 *
 * QuickFormでつくったフォームをAJAXで利用します。
 * QuickFormでレンダーされたフォームを、jqeruy.bear.jsのajaxForm()でAJAX化します。
 * エラーはJSONで返され、jqeruy.bear.jsによって解析されerrorのCSSとエラー内容のバルーンチップが付加されます。
 * バリデーションOKの場合は通常の動作をしonActionがコールされます。
 */
class Page_Ajax_Basic_Ajax_Form extends App_Page
{
    public function onInject()
    {
        parent::onInject();
        $this->_ajax = BEAR::dependency('BEAR_Page_Ajax');
    }

    public function onInit(array $args)
    {
        $this->_buildForm();
    }

    /**
     * フォーム作成
     *
     * @todo Pageではなく別クラスに
     */
    public function _buildForm()
    {
        $form = BEAR::dependency('BEAR_Form');
        //  フォームヘッダー
        $form->addElement('header', 'main', '入力(確認）してください');
        //  フォームインプットフィールド
        $form->addElement('text', 'name', '名前', 'size=30 maxlength=30');
        $form->addElement('text', 'email', 'メールアドレス', 'size=30 maxlength=30');
        $form->addElement('textarea', 'body', '感想');
        $form->addElement('reset', 'reset', 'クリア');
        $form->addElement('submit', '_submit', '送信', 'rel=ajax');
        // フィルタと検証ルール
        $form->applyFilter('__ALL__', 'trim');
        $form->applyFilter('__ALL__', 'strip_tags');
        $form->addRule('name', '名前を入力してください', 'required', null, '');
        $form->addRule('email', 'emailを入力してください', 'required', null, '');
        // 第４引数に'client'を指定してクライアントサイドでもエラーチェック
        $form->addRule('email', 'emailの形式で入力してください', 'email', null, 'client');
    }

    public function onAction(array $submit)
    {
        $this->_ajax->addAjax('html', ['msg' => 'okです!']);
        $this->output('ajax');
        exit();
    }
}

BEAR_Main::run('Page_Ajax_Basic_Ajax_Form');
