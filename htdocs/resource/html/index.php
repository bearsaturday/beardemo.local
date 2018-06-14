<?php

require_once 'App.php';

/**
 * RSSリソース
 */
class Page_Resource_Html_Index extends App_Page
{
    public function onInject()
    {
        parent::onInject();
        $this->injectArg('host', '127.0.0.1:8080');
        $this->injectArg('uri', 'http://news.google.com/news?ned=us&ie=UTF-8&oe=UTF-8&q=%E3%82%AF%E3%83%9E%E5%87%BA%E6%B2%A1&output=rss&num=50&hl=ja');
        $this->injectArg('cache_life', 300);
    }

    public function onInit(array $args)
    {
        // RSS resource
        $uri = $args['uri'];
        $options = [];
        $options['pager'] = 5;
        $options['template'] = 'list/rss';
        $options['cache'] = ['life' => $args['cache_life']];
        $params = ['uri' => $uri, 'values' => [], 'options' => $options];
        $body = $this->_resource->read($params)->set('rss')->getBody();
        $uri = "http://{$args['host']}/resource/html/hello.html";
        $params = ['uri' => $uri];
        $this->_resource->read($params)->set('html');
        $this->set('time', date('n/j H:i'));
    }

    public function onOutput()
    {
        $this->display('index.tpl');
    }
}

$config = ['cache' => ['type' => 'init', 'life' => 15]];
App_Main::run('Page_Resource_Html_Index', $config);
