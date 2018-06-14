<?php

require_once 'App.php';

/**
 * 記事表示ページ
 *
 * $_GET['id']で与えられたidの記事を表示します
 */
class Page_Db_Select_Item extends App_Page
{
    public function onInject()
    {
        $this->injectGet('id');
        parent::onInject();
    }

    /**
     * @required id
     */
    public function onInit(array $args)
    {
        $uri = 'Entry';
        $params = [
            'uri' => $uri,
            'values' => $args,
            'options' => []
        ];
        $this->_resource->read($params)->set('entry');
    }

    public function onOutput()
    {
        $this->display();
    }
}

App_Main::run('Page_Db_Select_Item');
