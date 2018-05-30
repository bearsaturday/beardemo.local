<?php

require_once 'App.php';

/**
 * シャットダウンオプションセット
 */
class Page_Resource_Set_Shutdown extends App_Page
{
    public function onInject()
    {
        parent::onInject();
    }

    /**
     * @requied id
     */
    public function onInit(array $args)
    {
        // bodyをeagerでset
        $params = ['uri' => 'Entry',
            'values' => ['title' => 'set', 'body' => 'requestOnShutdown'],
            'options' => []
        ];
        $this->_resource->create($params)->requestOnShutdown();
    }

    public function onOutput()
    {
        echo 'display' . time();
    }

    public static function onShutdown()
    {
        echo 'good bye';
    }
}
App_Main::run('Page_Resource_Set_Shutdown');
