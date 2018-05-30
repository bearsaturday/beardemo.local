<?php

require_once 'App.php';

/**
 * htdocs/db/select/item.phpのページクラスをリソースとして利用しています
 */
class Page_Resource_Page extends App_Page
{
    public function onInject()
    {
        parent::onInject();
    }

    public function onInit(array $config)
    {
        $uri = 'page://self/db/select/item';
        $values = ['id' => 1];
        // as resource
        $options = ['output' => 'resource'];
        $params = ['uri' => $uri, 'values' => $values, 'options' => $options];
        $this->_resource->read($params)->set('page');
        // HTML - for Default UA
        $options = ['output' => 'html', 'page' => ['ua' => 'Default']];
        $params = ['uri' => $uri, 'values' => $values, 'options' => $options];
        $ro = $this->_resource->read($params)->getRo();
        $headers = $ro->getHeaders();
        $this->set('headers', $headers);
        $body = $ro->getBody();
        $this->set('body', $body);
        // HTML - for Docomo UA
        $options = ['output' => 'html', 'page' => ['ua' => 'Docomo']];
        $params = ['uri' => $uri, 'values' => $values, 'options' => $options];
        $ro = $this->_resource->read($params)->getRo();
        $docomoHeaders = $ro->getHeaders();
        $this->set('docomo_headers', $docomoHeaders);
        $docomoBody = $ro->getBody();
        $this->set('docomo_body', $docomoBody);
    }

    public function onOutput()
    {
        $this->display();
    }
}
App_Main::run('Page_Resource_Page');
