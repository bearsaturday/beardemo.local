<?php
/**
 * App
 *
 * @category   BEAR
 * @package    bear.demo
 * @subpackage Ro
 * @author     $Author:$ <username@example.com>
 * @license    @license@ http://@license_url@
 * @version    Release: @package_version@ $Id:$
 * @link       http://@link_url@
 */

/**
 * Docomo 絵文字リソース
 *
 * @category   BEAR
 * @package    bear.demo
 * @subpackage Ro
 * @author     $Author:$ <username@example.com>
 * @license    @license@ http://@license_url@
 * @version    Release: @package_version@ $Id:$
 * @link       http://@link_url@
 */
class App_Ro_Emoji_Docomo extends App_Ro
{
    /**
     * Read
     *
     * @param array $values
     *
     * @return array
     */
    public function onRead($values)
    {
        // Docomo 基本+拡張絵文字
        for ($i = BEAR_Emoji::DOCOMO_MIN; $i <= 63740; $i++) {
            $result[] = array('key' => $i, 'value' => "&#{$i};");
        }
        for ($i = 63808; $i <= BEAR_Emoji::DOCOMO_MAX; $i++) {
            $result[] = array('key' => $i, 'value' => "&#{$i};");
        }
        return $result;
    }
}