<?php
// set_include_path('/Users/akihito/www/bear.demo' . PATH_SEPARATOR . get_include_path());

$_SERVER['bearmode'] = 1;
require 'App.php';

$params = array('uri' => 'page://db/select/item', 'values' => array('id' => 1), 'options' => array('output' => 'resource'));
$body = BEAR::dependency('BEAR_Resource')->read($params)->getBody();
p($body);

$params = array('uri' => 'page://db/select/item', 'values' => array('id' => 1), 'options' => array('output' => 'html'));
$body = BEAR::dependency('BEAR_Resource')->read($params)->getBody();
p($body);

$params = array('uri' => 'page://db/select/item', 'values' => array('id' => 1), 'options' => array('output' => 'html'));
$body = BEAR::dependency('BEAR_Resource')->read($params)->getBody();
p($body);
