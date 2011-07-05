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
 * スタティックリソース
 *
 * csvファイルをリソースとして使用しています。
 *
 * @category   BEAR
 * @package    bear.demo
 * @subpackage Page
 * @author     $Author:$ <username@example.com>
 * @license    @license@ http://@license_url@
 * @version    Release: @package_version@ $Id:$
 * @link       http://@link_url@
 */
class Page_Resource_Csv extends App_Page
{
    /**
     * Init
     *
     * @return void
     */
    public function onInit(array $config)
    {
        $params = array(
            'uri' => 'Post/tokyo.csv',
            'values' => array(),
            'options' => array('pager' => 25)
        );
        $ro = $this->_resource->read($params)->set('post');
    }

    public function onOntput()
    {
        $this->display('csv.tpl');
    }
}
BEAR_Main::run('Page_Resource_Csv');