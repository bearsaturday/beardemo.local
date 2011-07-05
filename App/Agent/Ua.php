<?php
/**
 * App
 *
 * @category   BEAR
 * @package    bear.demo
 * @subpackage Agent
 * @author     $Author:$ <username@example.com>
 * @license    @license@ http://@license_url@
 * @version    Release: @package_version@ $Id:$
 * @link       http://@link_url@
 */

/**
 * UAインジェクト
 *
 * @category   BEAR
 * @package    bear.demo
 * @subpackage Agent
 * @author     $Author:$ <username@example.com>
 * @license    @license@ http://@license_url@
 * @version    Release: @package_version@ $Id:$
 * @link       http://@link_url@
 */
class App_Agent_Ua implements BEAR_Injector_Interface
{
    /**
     * UAインジェクト
     *
     * @param BEAR_Main &$object App_Mainオブジェクト
     * @param array     $config  設定
     *
     * @return void
     */
    public static function inject(BEAR_Main &$object, $config)
    {
        if (strpos($config['user_agent'], 'iPhone') !== false) {
            // iPhoneの場合
            $ua = BEAR_Agent::UA_IPHONE;
        } else {
            $ua = BEAR_Agent::UA_DEFAULT;
        }
        $object->setService('_ua', $ua);
    }
}