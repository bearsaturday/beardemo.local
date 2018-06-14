<?php

require_once 'App.php';

/**
 * DBセレクトページ
 *
 * DBからデータをSELECTし、ページングして表示しています。
 * ソートはリソースのクエリーツールの設定で許可されたキーが有効になります。ページでハンドリングする必要はありません。
 */
class Page_Db_Select_Index extends App_Page
{
    public function onInit(array $args)
    {
        $params = [
            'uri' => 'Entry',
            'values' => [],
            'options' => [
                'template' => 'list/entry',
                'cache' => [
                    'life' => 10,
                    'link' => true
                 ]
              ]
        ];
        $this->_resource->read($params)->set('entry');
    }

    public function onOutput()
    {
        $this->display();
    }
}

App_Main::run('Page_Db_Select_Index');
