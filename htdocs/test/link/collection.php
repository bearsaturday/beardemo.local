<?php
/**
 * bear.demo
 *
 * @package Page
 */
require_once 'App.php';

/**
 * リソースリンクページ
 *
 * 様々なリンクの確認テストです。
 *
 * @package Page
 * @author  $Author: koriyama@users.sourceforge.jp $
 * @version SVN: Release: $Id: index.php 1201 2009-11-10 06:39:01Z koriyama@users.sourceforge.jp $
 */
class Page_Test_Resource_Link_Collection extends App_Page
{

    /**
     * Inject
     *
     * @return void
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
     *
     * @return void
     */
    public function onInit(array $args)
    {
        $params = array('uri' => 'User', 'values' =>  array('id' => $args['id']));
        $ro = $this->_resource->read($params)->p();
        $ro = $this->_resource->read($params)->link('photo')->p();
        $ro = $this->_resource->read($params)->link('blog')->p();
        $ro = $this->_resource->read($params)->link('blog')->link('entry')->link('comment')->link('thumb')->p();
        $ro = $this->_resource->read($params)->link(array('photo', 'blog'))->p();
        $ro = $this->_resource->read($params)->link(array('photo', 'blog'))->link('entry')->p();
        $ro = $this->_resource->read($params)->link(array('photo', 'blog'))->link('entry')->link('comment')->p();
        $ro = $this->_resource->read($params)->link(array('photo', 'blog'))->link('entry')->link(array('trackback', 'comment'))->p();
        $ro = $this->_resource->read($params)->link(array('photo', 'blog'))->link('entry')->link(array('trackback', 'comment'))->link('thumb')->set();
        $ro = $this->_resource->read($params)->link(array('photo', 'blog'))->link('entry')->link(array('trackback', 'comment'))->link('thumb')->p()->set()->getRo();
        $values = array();
        $params = array('uri' => 'User/Blog/Entry', 'values' =>  $values);
        $ro = $this->_resource->read($params)->link('comment')->p()->set();
    }

    /**
     * Output
     *
     * @return void
     */
    public function onOutput()
    {
        $this->display('collection.tpl');
    }
}

App_Main::run('Page_Test_Resource_Link_Collection');
