<?php

require_once 'App.php';

/**
 * リンク付リソースのページング
 *
 * @license    @license@ http://@license_url@
 *
 * @link       http://@link_url@
 */
class Page_Resource_Link_Pager extends App_Page
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
     */
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

    /**
     * Output
     */
    public function onOutput()
    {
        $this->display();
    }
}

App_Main::run('Page_Resource_Link_Pager');
