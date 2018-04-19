<?php
/**
 * This file is part of the beardemo.local package.
 *
 * @license http://opensource.org/licenses/bsd-license.php BSD
 */
$_SERVER['bearmode'] = 0;
require_once 'App.php';

class Page_Test_Error_Exception extends App_Page
{
    /**
     * Init
     */
    public function onInit(array $args)
    {
        $result = $this->_resource->read(array('uri' => 'Sample/Error'))->getRo();
    }

    public function onOutput()
    {
        echo 'Bad　Reuestリソーステスト終了';
    }
}

App_Main::run('Page_Test_Error_Exception');
