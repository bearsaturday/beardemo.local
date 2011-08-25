<?php
/**
 * bear.demo
 *
 * @package Page
 */
require_once 'App.php';

/**
 * Simpleフォーム
 *
 * <pre>
 * フォームをサブミット後フリーズさせています。
 * フォームオブジェクトをonActionでfreezeするために一旦プロパティにいれています。
 * </pre>
 *
 * @package Page
 * @author  $Author:$
 * @version SVN: Release: $Id:$
 */
class Page_Test_Form_Mobile_Index extends App_Page
{

    /**
     * Inject
     *
     * @return void
     */
    public function onInject()
    {
        parent::onInject();
    }

    /**
     * Init
     *
     * @return void
     */
    public function onInit(array $args)
    {
        $this->_form = BEAR::dependency('App_Form_Simple')->build();
        // 太陽　($submitで得られる10進数エンティティ)
        $dsun = array();
        $dsun[BEAR_Agent::UA_DOCOMO] = '&#63647;';
        $dsun[BEAR_Agent::UA_EZWEB] = '&#63072;';
        $dsun[BEAR_Agent::UA_SOFTBANK] = '&#57418;';
        $this->set('dsun', $dsun);
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
     * @return
     */
    public function onAction(array $submit)
    {
    	$this->set('sumit_name', $submit['name']);
        $this->_form->freeze();
        $this->display();
    }
}
$sun[BEAR_Agent::UA_DOCOMO] = pack('H*', 'F89F');
$sun[BEAR_Agent::UA_EZWEB] = pack('H*', 'F660');
$sun[BEAR_Agent::UA_SOFTBANK] = '$Gj';
$ua = $_GET['ua'];
if (!$ua) {
	echo '<a href="?ua=Docomo">try again</a>';
	exit();
}
$msg = mb_convert_encoding('こんにちは', 'SJIS-win', 'UTF-8') . $sun[$ua];
$_POST = array('name' => $msg, '_token' => 1, "_qf__form"=> '');
App_Main::run('Page_Test_Form_Mobile_Index', array('ua' => $ua));