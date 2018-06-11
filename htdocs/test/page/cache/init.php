<?php

$_SERVER['bearmode'] = 2;
require_once 'App.php';
//require_once 'MDB2.php';

require dirname(__DIR__, 4) . '/htdocs/resource/template.php';

class Page_Test_Page_Cache_Init extends Page_Resource_Template
{
}

$config = ['cache' => ['type' => 'init', 'life' => 1]];
App_Main::run('Page_Test_Page_Cache_Init', $config);
