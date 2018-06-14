<?php

require_once 'App.php';

/**
 * リンク付リソースのページング
 */
class Page_Resource_Link_Pager extends App_Page
{
    public function onInject()
    {
        parent::onInject();
        $this->injectGet('id', 'id', 1);
    }

    public function onInit(array $args)
    {
        $params = [
            'uri' => 'User',
            'values' => ['id' => $args['id']],
            'options' => [
                'template' => 'link/pager']
            ];
        $this->_resource->read($params)->link('blog')->link('db_entry')->set('blog');
    }

    public function onOutput()
    {
        $this->display();
    }
}

App_Main::run('Page_Resource_Link_Pager');
