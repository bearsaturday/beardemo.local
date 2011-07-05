<?php
/**
 * App
 *
 * @category   BEAR
 * @package    bear.demo
 * @subpackage Page
 * @author     $Author:$ <username@example.com>
 * @license    @license@ http://@license_url@
 * @version    Release: @package_version@ $Id: page.php 481 2011-07-04 09:41:51Z koriyama@bear-project.net $
 * @link       http://@link_url@
 */

require_once 'App.php';

/**
 * htdocs/db/select/item.phpのページクラスをリソースとして利用しています
 *
 * @category   BEAR
 * @package    bear.demo
 * @subpackage Page
 * @author     $Author:$ <username@example.com>
 * @license    @license@ http://@license_url@
 * @version    Release: @package_version@ $Id: page.php 481 2011-07-04 09:41:51Z koriyama@bear-project.net $
 * @link       http://@link_url@
 */
class Page_Resource_Page extends App_Page
{

    /**
     * Inject
     *
     * @return void
     */
    public function onInject()
    {
        parent::onInject();
    }

    /**
     * Init
     *
     * @return void
     */
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

    /**
     * Output
     *
     * @return void
     */
    public function onOutput()
    {
        $this->display();
    }

}
App_Main::run('Page_Resource_Page');