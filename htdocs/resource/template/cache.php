<?php

require_once 'App.php';

/**
 * リソーステンプレートページ
 *
 * リソーステンプレートにキャッシュオプションを指定しています。
 *
 * @license    @license@ http://@license_url@
 *
 * @link       http://@link_url@
 */
class Page_Resource_Template_Cache extends App_Page
{
    /**
     * Inject
     */
    public function onInject()
    {
        parent::onInject();
        $this->injectGet('id', 'id', 1);
    }

    /**
     * Init
     *
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

    /**
     * Output
     */
    public function onOutput()
    {
        $this->display('/resource/template.tpl');
    }
}
App_Main::run('Page_Resource_Template_Cache');
