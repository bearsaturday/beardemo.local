<?php
/**
 * App
 *
 * @category   BEAR
 * @package    bear.demo
 * @subpackage Page
 * @author     $Author:$ <username@example.com>
 * @license    @license@ http://@license_url@
 * @version    Release: @package_version@ $Id:$
 * @link       http://@link_url@
 */

require_once 'App.php';

/**
 * RSSリソース
 *
 * @category   BEAR
 * @package    bear.demo
 * @subpackage Page
 * @author     $Author:$ <username@example.com>
 * @license    @license@ http://@license_url@
 * @version    Release: @package_version@ $Id:$
 * @link       http://@link_url@
 */
class Page_Resource_Html_Index extends App_Page
{
    /**
     * Inject
     *
     * @return void
     */
    public function onInject()
    {
        parent::onInject();
        $this->injectArg('host', 'beardemo.local');
        $this->injectArg('uri', 'http://news.google.com/news?ned=us&ie=UTF-8&oe=UTF-8&q=%E3%82%AF%E3%83%9E%E5%87%BA%E6%B2%A1&output=rss&num=50&hl=ja');
        $this->injectArg('cache_life', 300);
    }

    /**
     * Init
     *
     * @return void
     */
    public function onInit(array $args)
    {
        // RSS resource
        $uri = $args['uri'];
        $options = array();
        $options['pager'] = 5;
        $options['template'] = 'list/rss';
        $options['cache'] = array('life' => $args['cache_life']);
        $params = array('uri' => $uri, 'values' => array(), 'options' => $options);
        $body = $this->_resource->read($params)->set('rss')->getBody();
        $uri = "http://{$args['host']}/resource/html/hello.html";
        $params = array('uri' => $uri);
        $this->_resource->read($params)->set('html');
        $this->set('time' , date('n/j H:i'));
    }

    /**
     * Output
     *
     * @return void
     */
    public function onOutput()
    {
        $this->display('index.tpl');
    }
}

$config = array('cache' => array('type' => 'init', 'life' => 15));
App_Main::run('Page_Resource_Html_Index', $config);
