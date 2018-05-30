<?php

require_once 'App.php';

/**
 * リソーステンプレートページ
 *
 * リソーステンプレートにキャッシュオプションを指定しています。
 */
class Page_Resource_Template_Cache extends App_Page
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
        $params = [
            'uri' => 'User',
            'values' => ['id' => $args['id']],
            'options' => [
                'template' => 'user',
                'cache' => ['life' => 100]
            ]
        ];
        $this->_resource->read($params)->set('user', 'value');
    }

    public function onOutput()
    {
        $this->display('/resource/template.tpl');
    }
}
App_Main::run('Page_Resource_Template_Cache');
