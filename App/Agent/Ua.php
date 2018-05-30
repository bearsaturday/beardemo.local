<?php


/**
 * UAインジェクト
 */
class App_Agent_Ua implements BEAR_Injector_Interface
{
    /**
     * UAインジェクト
     *
     * @param BEAR_Main &$object App_Mainオブジェクト
     * @param array     $config  設定
     */
    public static function inject($object, $config)
    {
        if (! isset($config['user_agent'])) {
            $object->setService('_ua', BEAR_Agent::UA_DEFAULT);

            return;
        }
        $agentMobile = BEAR::dependency('BEAR_Agent_Mobile', ['user_agent' => $config['user_agent']]);
        if ($agentMobile->isNonMobile()) {
            if (strpos($config['user_agent'], 'iPhone') !== false) {
                // iPhoneの場合
                $ua = BEAR_Agent::UA_IPHONE;
            } elseif (strpos($config['user_agent'], 'iPad') !== false) {
                // iPadの場合
                $ua = BEAR_Agent::UA_IPAD;
            } elseif (strpos($config['user_agent'], 'Android') !== false && strpos($config['user_agent'], 'Mobile') !== false) {
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
