<?php

require_once 'App.php';

/**
 * Ajax Resource
 *
 * onInit()でsetされたリソースを指定のIDをプレースホルダにしてコンテンツを埋め込みます。
 */
class Page_Ajax_Basic_Ajax_Resource extends App_Page
{
    public function onInject()
    {
        $this->_resource = BEAR::dependency('BEAR_Resource');
        $this->_ajax = BEAR::dependency('BEAR_Page_Ajax');
    }

    public function onInit(array $config)
    {
        $options['mock']['name'] = 'test';
        $options['mock']['x'] = array('name', 'age', 'gender');
        $options['mock']['y'] = 2;
        $options['template'] = 'person';
        $params = array('uri' => 'person', 'options' => $options);
        $this->_resource->read($params)->set();
    }

    public function onOutput()
    {
        $this->_ajax->addAjax(
            'resource',
            array('person1' => 'person'),
            array('effect' => 'slide')
        );
        $this->_ajax->addAjax(
            'html',
            array('msg' => 'AJAXリソース取得'),
            array('effect' => 'show')
        );
        $this->output('ajax');
    }
}

BEAR_Main::run('Page_Ajax_Basic_Ajax_Resource');
