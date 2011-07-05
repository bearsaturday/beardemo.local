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
 * シャットダウンオプションセット
 *
 * @category   BEAR
 * @package    bear.demo
 * @subpackage Page
 * @author     $Author:$ <username@example.com>
 * @license    @license@ http://@license_url@
 * @version    Release: @package_version@ $Id:$
 * @link       http://@link_url@
 */
class Page_Resource_Set_Shutdown extends App_Page
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
     * @requied id
     *
     * @return void
     */
    public function onInit(array $args)
    {
        // bodyをeagerでset
        $params = array('uri' => 'Entry',
            'values' => array('title' => 'set', 'body' => 'requestOnShutdown'),
            'options' => array()
        );
        $this->_resource->create($params)->requestOnShutdown();
    }

    /**
     * Output
     *
     * @return void
     */
    public function onOutput()
    {
        echo 'display' . time();
    }

   /**
    * Shutdown
    *
    * @return void
    */
    public static function onShutdown()
    {
        echo 'good bye';
    }
}
App_Main::run('Page_Resource_Set_Shutdown');
