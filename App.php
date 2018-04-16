<?php
/**
 * bear.demo for BEAR v0.9(saturday)
 *
 * @category  BEAR
 * @package   bear.emo
 * @author    $Author:$ <username@example.com>
 * @license   @license@ http://@license_url@
 * @version   Release: @package_version@ $Id:$
 * @link      http://@link_url@
 */

/**
 * App root path
 */
if (!defined('_BEAR_APP_HOME')) {
    define('_BEAR_APP_HOME', realpath(dirname(__FILE__)));
}
require_once 'vendor/autoload.php';
require_once 'BEAR.php';

$bearMode = isset($_SERVER['bearmode']) ? $_SERVER['bearmode'] : 0;
// profile
//include 'BEAR/Dev/Profile/script/startxh.php'; //xhprof
App::init($bearMode);

/**
 * App
 *
 * @category   BEAR
 * @package    bear.app
 * @subpackage Db
 * @author     $Author:$ <username@example.com>
 * @license    @license@ http://@license_url@
 * @version    Release: @package_version@ $Id:$
 * @link       http://@link_url@
 */
class App
{
    /**
     * App init
     *
     * @param int $bearMode
     *
     * @return void
     */
    public static function init($bearMode = 1)
    {
        $app = BEAR::loadConfig(_BEAR_APP_HOME . '/App/app.yml', true);
        switch ($bearMode) {
            case 1 :
                //debug mode (cache disabled)
                $app['BEAR_Cache']['adapter'] = 0;
            case 2 :
                //debug mode (cache enabled)
                $app['core']['debug'] = true;
                $app['App_Db']['dsn']['default'] = $app['App_Db']['dsn']['slave'] = $app['App_Db']['dsn']['test'];
                $app['BEAR_Ro_Prototype']['__class'] = 'BEAR_Ro_Prototype_Debug';
                break;
            case 100:
                // for HTTP access UNIT test
                $app['core']['debug'] = false;
                $app['BEAR_Log']['__class'] = 'BEAR_Log_Test';
                $app['BEAR_Resource_Request']['__class'] = 'BEAR_Resource_Request_Test';
                break;
            case 3 :
                echo 'dbセッションテスト';
                // dbセッションテスト
                $app['BEAR_Session']['adapter'] = 2;
                $app['BEAR_Session']['path'] = 'mysql://bear_demo:bear@localhost/bear_demo';
                $app['BEAR_Session']['idle'] = 3;
                $app['BEAR_Session']['expire'] = 10;
                $app['BEAR_Session']['callback'] = array('App_Session', 'onSessionTimeOut');
                $app['core']['debug'] = true;
                break;
            case 4 :
                // ファイルセッションテスト
                $app['BEAR_Session']['adapter'] = 1;
                $app['BEAR_Session']['path'] = '/tmp';
                $app['BEAR_Session']['idle'] = 3;
                $app['BEAR_Session']['callback'] = array('App_Session', 'onSessionTimeOut');
                $app['core']['debug'] = true;
                break;
            case 5 :
                // memcacheセッションテスト
                $app['BEAR_Session']['adapter'] = 3;
                $app['BEAR_Session']['path'] = 'localhost';
                $app['BEAR_Cache_Adapter_Memcache']['port'] = '11211';
                $app['BEAR_Session']['idle'] = 3;
                $app['BEAR_Session']['callback'] = array('App_Session', 'onSessionTimeOut');
                $app['core']['debug'] = true;
                break;
            case 10 :
                $app['core']['debug'] = false;
                $app['core']['prof'] = true;
                break;
            case 20 :
                // DB選択テスト
                $app['core']['debug'] = true;
                break;
            case 30 :
                // UA Injectテスト
                $app['core']['debug'] = true;
                $app['BEAR_Agent']['ua_inject'] = 'App_Agent_Ua';
                break;
            case 100:
                // for HTTP access UNIT test
                $app['core']['debug'] = false;
                $app['BEAR_Log']['__class'] = 'BEAR_Log_Test';
                $app['BEAR_Resource_Request']['__class'] = 'BEAR_Resource_Request_Test';
                ob_start();
                break;
            case 0 :
            default :
                // live
                $app['core']['debug'] = false;
                break;
        }
        BEAR::init($app);
    }
}
