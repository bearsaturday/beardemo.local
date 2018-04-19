<?php

require_once 'App.php';

/**
 * リソースリンクページ
 *
 * リソースリクエストにリソーステンプレートオプションを指定しています。
 */
class Page_Resource_Template extends App_Page
{
    public function onInject()
    {
        parent::onInject();
        $this->injectGet('id', 'id', 1);
    }

    /**
     * @requied id
     */
    public function onInit(array $args)
    {
        $params = array(
            'uri' => 'User',
            'values' => array('id' => $args['id']),
            'options' => array('template' => 'user')
        );
        $this->_resource->read($params)->set('user', 'value');
    }

    public function onOutput()
    {
        $this->display('/resource/template.tpl');
    }
}

App_Main::run('Page_Resource_Template');
