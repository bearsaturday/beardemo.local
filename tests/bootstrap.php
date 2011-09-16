<?php
// set path
$path = '/usr/local/bear:/usr/local/app/bear.demo';
// set autoloder
set_include_path($path . PATH_SEPARATOR . get_include_path());
require_once 'App.php';

spl_autoload_register('bearTestAutolodaer');
include_once 'utility/v.php';

$filter = PHP_CodeCoverage_Filter::getInstance();
$filter->removeDirectoryFromWhitelist('/Users/akihito/www/bear.demo/App/views');

function bearTestAutolodaer($class) {
    $file = str_replace('_', DIRECTORY_SEPARATOR, $class) . '.php';
    include_once $file;
}
