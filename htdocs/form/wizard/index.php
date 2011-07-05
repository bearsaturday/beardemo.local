<?php
/**
 * App
 *
 * @category   BEAR
 * @package    bear.demo
 * @subpackage Page
 * @author     $Author:$ <username@example.com>
 * @license    @license@ http://@license_url@
 * @version    Release: @package_version@ $Id: index.php 447 2011-06-01 00:31:53Z koriyama@bear-project.net $
 * @link       http://@link_url@
 */

require_once 'App.php';

/**
 * Page Title
 *
 * 確認画面つきフォーム
 *
 * 初期表示フォーム、確認表示フォーム、修正フォームの３種類のフォームの状態をそれぞれの種類のインジェクターでフォームの状態を変えています。
 * 画面は初期（修正）画面、確認画面、送信後画面と３つあります。
 *
 * @category   BEAR
 * @package    bear.demo
 * @subpackage Page
 * @author     $Author:$ <username@example.com>
 * @license    @license@ http://@license_url@
 * @version    Release: @package_version@ $Id: index.php 447 2011-06-01 00:31:53Z koriyama@bear-project.net $
 * @link       http://@link_url@
 */
class Page_Form_Wizard_Index extends App_Page
{
    /**
     * 最初のフォーム
     *
     * @param array $args
     *
     * @return void
     */
    public function onClickNone(array $args)
    {
        BEAR::dependency('App_Form_Wizard_One')->buildOne()->button();
    }

    /**
     * ２番目のフォーム
     *
     * @param array $args
     *
     * @return void
     */
    public function onClickTwo(array $args)
    {
        BEAR::dependency('App_Form_Wizard_Two')->buildTwo()->button();
    }

    /**
     * ３番目のフォーム
     *
     * @param array $args
     *
     * @return void
     */
    public function onClickThree(array $args)
    {
        BEAR::dependency('App_Form_Wizard_Three')->buildThree()->button();
    }

    /**
     * 確認フォームでは３つのフォームをbuildしfreezeします。
     *
     * @param array $args
     *
     * @return void
     */
    public function onClickPreview(array $args)
    {
        BEAR::dependency('App_Form_Wizard_Preview')->buildOne()->buildTwo()->buildThree()->button();
    }

    /**
     * 確認フォームからサブミット
     *
     * 画面出力はありませんが、最終的にもう一度フォームのバリデーションを行うためにbuildします
     *
     * @param array $args
     *
     * @return void
     */
    public function onClickAction(array $args)
    {
        BEAR::dependency('App_Form_Wizard_Preview')->buildOne()->buildTwo()->buildThree()->button();
    }

    /**
     * Inject
     *
     * @return void
     */
    public function onInject()
    {
        parent::onInject();
        $this->_header = BEAR::dependency('BEAR_Page_Header');
        $this->_defaults = $this->_session->get('wizard_submit');
    }

    /**
     * Init
     *
     * @return void
     */
    public function onInit(array $args)
    {
        $wizardSubmit = $this->_session->get('wizard_submit');
    }

    /**
     * Output
     *
     * @return void
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
     *
     * @return void
     */
    public function onAction(array $submit)
    {
        //$submitValues = BEAR::dependency('BEAR_Form_Service')->getSubmitValues(); // for BEAR 0.9.0
        $submitValues = BEAR_Form::$submitValue; // for BEAR 0.8.0 -

        $click = isset($submitValues['_click']) ? $submitValues['_click'] : '';
        if ($click === 'action') {
            //確認画面から送信ボタンでアクション実行
            $this->set('submit', print_r($submit, true));
            $this->display('action.tpl');
            return;
            //$this->end();
        }
        // 次のフォームへ
        $wizardSubmit = $this->_session->get('wizard_submit');
        $wizardSubmit = is_array($wizardSubmit) ? $wizardSubmit : array();
        $this->_session->set('wizard_submit', array_merge($wizardSubmit, $submit));
        $options['click'] = $click;
        $options['value'] = $submit;
        $this->_header->redirect('.', $options);
    }
}

App_Main::run('Page_Form_Wizard_Index');