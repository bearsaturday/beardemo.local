<?php

require_once 'App.php';

/**
 * リソースリンクページ
 *
 * 様々なリンクの確認テストです。
 */
class Page_Test_Resource_Link_Collection extends App_Page
{
    public function onInject()
    {
        $this->injectGet('id', 'id', 1);
        parent::onInject();
    }

    /**
     * @requied id
     */
    public function onInit(array $args)
    {
        $params = ['uri' => 'User', 'values' => ['id' => $args['id']]];
        $ro = $this->_resource->read($params)->p();
        $ro = $this->_resource->read($params)->link('photo')->p();
        $ro = $this->_resource->read($params)->link('blog')->p();
        $ro = $this->_resource->read($params)->link('blog')->link('entry')->link('comment')->link('thumb')->p();
        $ro = $this->_resource->read($params)->link(['photo', 'blog'])->p();
        $ro = $this->_resource->read($params)->link(['photo', 'blog'])->link('entry')->p();
        $ro = $this->_resource->read($params)->link(['photo', 'blog'])->link('entry')->link('comment')->p();
        $ro = $this->_resource->read($params)->link(['photo', 'blog'])->link('entry')->link(['trackback', 'comment'])->p();
        $ro = $this->_resource->read($params)->link(['photo', 'blog'])->link('entry')->link(['trackback', 'comment'])->link('thumb')->set();
        $ro = $this->_resource->read($params)->link(['photo', 'blog'])->link('entry')->link(['trackback', 'comment'])->link('thumb')->p()->set()->getRo();
        $values = [];
        $params = ['uri' => 'User/Blog/Entry', 'values' => $values];
        $this->_resource->read($params)->link('comment')->p()->set();
    }

    public function onOutput()
    {
        $this->display('collection.tpl');
    }
}

App_Main::run('Page_Test_Resource_Link_Collection');
