<?php

$_SERVER['bearmode'] = 2;
require_once 'App.php';
require dirname(__DIR__, 4) . '/htdocs/resource/template.php';

class Page_Test_Page_Cache_Page extends Page_Resource_Template
{
}

$config = ['cache' => ['type' => 'page', 'life' => 10]];
App_Main::run('Page_Test_Page_Cache_Page', $config);
