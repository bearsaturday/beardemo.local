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

$_SERVER['bearmode'] = 20;
require_once 'App.php';

/**
 * DBのslave / masterが正しく選択されるかのテスト
 *
 * @category   BEAR
 * @package    bear.demo
 * @subpackage Page
 * @author     $Author:$ <username@example.com>
 * @license    @license@ http://@license_url@
 * @version    Release: @package_version@ $Id:$
 * @link       http://@link_url@
 */
class Page_Test_Page_Db_Rw extends App_Page
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
        $params = array('uri' => 'Test/Db/Entry');
        $req1 = $this->_resource->read($params)->getBody();
        p($req1);
        $createParams = $params;
        $createParams['values'] = array('title' => time(), 'body' => '');
        $this->_resource->create($createParams)->request();
        $req2 = $this->_resource->read($params)->getBody();
        p($req2);
    }

    /**
     * 表示
     *
     * @return void
     */
    public function onOutput()
    {
        echo 'TEST End';
    }
}

App_Main::run('Page_Test_Page_Db_Rw', $config);
