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
 * DBセレクトページ
 *
 * DBからデータをSELECTし、ページングして表示しています。
 * ソートはリソースのクエリーツールの設定で許可されたキーが有効になります。ページでハンドリングする必要はありません。
 *
 * @category   BEAR
 * @package    bear.demo
 * @subpackage Page
 * @author     $Author:$ <username@example.com>
 * @license    @license@ http://@license_url@
 * @version    Release: @package_version@ $Id:$
 * @link       http://@link_url@
 */
class Page_Db_Select_Index extends App_Page
{
    /**
     * Init
     *
     * @return void
     */
    public function onInit(array $args)
    {
        $params = array('uri' => 'Entry',
        				'values' => array(),
        				'options' => array(
                			'template' => 'list/entry',
                			'cache' => array('life' => 10)
                        )
        );
        $this->_resource->read($params)->set('entry');
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
}

App_Main::run('Page_Db_Select_Index');
