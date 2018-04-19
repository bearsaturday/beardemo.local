<?php
/**
 * This file is part of the beardemo.local package.
 *
 * @license http://opensource.org/licenses/bsd-license.php BSD
 */
require_once 'App.php';

/**
 * スタティックリソース
 *
 * csvファイルをリソースとして使用しています。
 */
class Page_Resource_Csv extends App_Page
{
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
