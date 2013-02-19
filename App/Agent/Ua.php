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
    public static function inject($object, $config)
    {
        if (!isset($config['user_agent'])) {
            $object->setService('_ua', BEAR_Agent::UA_DEFAULT);
            return;
        }
        $agentMobile = BEAR::dependency('BEAR_Agent_Mobile', array('user_agent' => $config['user_agent']));
        if ($agentMobile->isNonMobile()) {
            if (strpos($config['user_agent'], 'iPhone') !== false) {
                // iPhoneの場合
                $ua = BEAR_Agent::UA_IPHONE;
            } else if (strpos($config['user_agent'], 'iPad') !== false) {
                // iPadの場合
                $ua = BEAR_Agent::UA_IPAD;
            } else if (strpos($config['user_agent'], 'Android') !== false  && strpos($config['user_agent'], 'Mobile') !== false) {
                // Androidの場合
                $ua = BEAR_Agent::UA_ANDROID;
            } else {
                $ua = BEAR_Agent::UA_DEFAULT;
            }
        } else {
            $ua = ucwords(strtolower($agentMobile->getCarrierLongName()));
        }
        $object->setService('_ua', $ua);
    }

}
