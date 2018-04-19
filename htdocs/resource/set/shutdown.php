<?php
/**
 * This file is part of the beardemo.local package.
 *
 * @license http://opensource.org/licenses/bsd-license.php BSD
 */
require_once 'App.php';

/**
 * シャットダウンオプションセット
 *
 * @license    @license@ http://@license_url@
 *
 * @link       http://@link_url@
 */
class Page_Resource_Set_Shutdown extends App_Page
{
    /**
     * Inject
     */
    public function onInject()
    {
        parent::onInject();
    }

    /**
     * Init
     *
     * @requied id
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
     */
    public function onOutput()
    {
        echo 'display' . time();
    }

    /**
     * Shutdown
     */
    public static function onShutdown()
    {
        echo 'good bye';
    }
}
App_Main::run('Page_Resource_Set_Shutdown');
