<?php
/**
 * This file is part of the beardemo.local package.
 *
 * @license http://opensource.org/licenses/bsd-license.php BSD
 */
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
        $values = array('id' => 1);
        // as resource
        $options = array('output' => 'resource');
        $params = array('uri' => $uri, 'values' => $values, 'options' => $options);
        $this->_resource->read($params)->set('page');
        // HTML - for Default UA
        $options = array('output' => 'html', 'page' => array('ua' => 'Default'));
        $params = array('uri' => $uri, 'values' => $values, 'options' => $options);
        $ro = $this->_resource->read($params)->getRo();
        $headers = $ro->getHeaders();
        $this->set('headers', $headers);
        $body = $ro->getBody();
        $this->set('body', $body);
        // HTML - for Docomo UA
        $options = array('output' => 'html', 'page' => array('ua' => 'Docomo'));
        $params = array('uri' => $uri, 'values' => $values, 'options' => $options);
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
