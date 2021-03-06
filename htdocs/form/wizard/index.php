<?php

require_once 'App.php';

/**
 * 確認画面つきフォーム
 *
 * 初期表示フォーム、確認表示フォーム、修正フォームの３種類のフォームの状態をそれぞれの種類のインジェクターでフォームの状態を変えています。
 * 画面は初期（修正）画面、確認画面、送信後画面と３つあります。
 */
class Page_Form_Wizard_Index extends App_Page
{
    /**
     * @var BEAR_Page_Header
     */
    private $_header;

    /**
     * @var array
     */
    private $_defaults;

    /**
     * 最初のフォーム
     */
    public function onClickNone(array $args)
    {
        /** @var App_Form_Wizard_One $form */
        $form = BEAR::dependency('App_Form_Wizard_One');
        $form->buildOne()->button();
    }

    /**
     * ２番目のフォーム
     *
     * @param array $args
     */
    public function onClickTwo(array $args)
    {
        /** @var App_Form_Wizard_Two $form */
        $form = BEAR::dependency('App_Form_Wizard_Two');
        $form->buildTwo()->button();
    }

    /**
     * ３番目のフォーム
     *
     * @param array $args
     */
    public function onClickThree(array $args)
    {
        /** @var App_Form_Wizard_Three $form */
        $form = BEAR::dependency('App_Form_Wizard_Three');
        $form->buildThree()->button();
    }

    /**
     * 確認フォームでは３つのフォームをbuildしfreezeします。
     *
     * @param array $args
     */
    public function onClickPreview(array $args)
    {
        /** @var App_Form_Wizard_Preview $form */
        $form = BEAR::dependency('App_Form_Wizard_Preview');
        $form->buildOne()->buildTwo()->buildThree()->button();
    }

    /**
     * 確認フォームからサブミット
     *
     * 画面出力はありませんが、最終的にもう一度フォームのバリデーションを行うためにbuildします
     *
     * @param array $args
     */
    public function onClickAction(array $args)
    {
        /** @var App_Form_Wizard_Preview $form */
        $form = BEAR::dependency('App_Form_Wizard_Preview');
        $form->buildOne()->buildTwo()->buildThree()->button();
    }

    /**
     * Inject
     */
    public function onInject()
    {
        parent::onInject();
        $this->_header = BEAR::dependency('BEAR_Page_Header');
        $this->_defaults = $this->_session->get('wizard_submit');
    }

    /**
     * Output
     */
    public function onOutput()
    {
        $this->display();
    }

    /**
     * Action
     *
     * フォームの値を次に引き継ぐためにセッションをつかっています。
     * hiddenの'_click'という値を次のどのフォームに行くかに利用しています。
     */
    public function onAction(array $submit)
    {
        $submitValues = BEAR_Form::$submitValue; // for BEAR 0.8.0 -
        $click = isset($submitValues['_click']) ? $submitValues['_click'] : '';
        if ($click === 'action') {
            //確認画面から送信ボタンでアクション実行
            $this->set('submit', print_r($submit, true));
            $this->display('action.tpl');

            return;
        }
        // 次のフォームへ
        $wizardSubmit = $this->_session->get('wizard_submit');
        $wizardSubmit = is_array($wizardSubmit) ? $wizardSubmit : [];
        $this->_session->set('wizard_submit', array_merge($wizardSubmit, $submit));
        $options = [
            'click' => $click,
            'value' => $submit
        ];
        $this->_header->redirect('.', $options);
    }
}

App_Main::run('Page_Form_Wizard_Index');
