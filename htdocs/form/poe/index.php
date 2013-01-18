<?php
/**
 * App
 *
 * @category   BEAR
 * @package    bear.demo
 * @subpackage Page
 * @author     $Author:$ <username@example.com>
 * @license    @license@ http://@license_url@
 * @version    Release: @package_version@ $Id:$
 * @link       http://@link_url@
 */

require_once 'App.php';

/**
 * シンプルフォーム
 *
 * @category   BEAR
 * @package    bear.demo
 * @subpackage Page
 * @author     $Author:$ <username@example.com>
 * @license    @license@ http://@license_url@
 * @version    Release: @package_version@ $Id:$
 * @link       http://@link_url@
 */
class Page_Form_Poe_Index extends App_Page
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
        BEAR::dependency('App_Form_Simple')->build();
    }

    /**
     * Output
     *
     * @return void
     */
    public function onOutput()
    {
        $this->display('/form/simple/index.tpl');
    }

    /**
     * Action
     *
     * @return void
     */
    public function onAction(array $submit)
    {
        $params = array('uri' => 'Test/Poe',
                        'values' => array(),
                        'options' => array(BEAR_Resource::OPTION_POE => true,
                                           BEAR_Resource::OPTION_CSRF => true
                         )
        );
        $this->_resource->create($params)->request();
        $this->set('submit', print_r($submit, true));
        // テスト用でここで表示してますが通常はredirectさせて画面出力します。
        $this->display('/form/simple/action.tpl');
    }
}

App_Main::run('Page_Form_Poe_Index');