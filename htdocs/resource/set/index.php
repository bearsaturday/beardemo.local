<?php

require_once 'App.php';

/**
 * リソースセットオプション
 *
 * ページセットオプションを変えてリソースをページにsetしています。
 */
class Page_Resource_Set_Index extends App_Page
{
    public function onInject()
    {
        parent::onInject();
    }

    /**
     * @requied id
     */
    public function onInit(array $args)
    {
        // bodyをeagerでset
        $params = ['uri' => 'Entry', 'values' => [], 'options' => []];
        $this->_resource->read($params)->set('arrayEntry', 'value');
        // bodyをeagerでset
        $options = ['template' => 'list/entry'];
        $params = ['uri' => 'Entry', 'values' => [], 'options' => $options];
        $this->_resource->read($params)->set('stringEntry', 'value');
        // objectをeagerでset (resource template付)
        $options = ['template' => 'list/entry'];
        $params = ['uri' => 'Entry', 'options' => $options];
        $this->_resource->read($params)->set('objectEntry', 'object');
        // objectをlazyでset (resource template付)
        $options = ['template' => 'list/entry'];
        $params = ['uri' => 'Entry', 'options' => $options];
        $this->_resource->read($params)->set('lazyEntry', 'lazy');
        // objectをlazyでset (resource templateなし)
        $params = ['uri' => 'Entry'];
        $ro = $this->_resource->read($params)->set('entry5', 'object')->getRo();
        // PHP 5.3 Only
        $values = ['id' => 1];
        $data = $ro($values)->getBody();
        $this->set('data', $data);
    }

    public function onOutput()
    {
        $this->display();
    }
}

$options = [];
$options['cache']['type'] = 'init';
$options['cache']['life'] = 10;
App_Main::run('Page_Resource_Set_Index', $options);
