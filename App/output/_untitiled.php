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
 * Untitledアウトプットフィルター
 *
 * @param array $values  引数
 * @param array $options オプション
 *
 * @return BEAR_Ro
 */
function outputUntitled($values, $options = null)
{
    $headers = array('X-BEAR-Output: untitled', 'Content-Type: text/html; charset=utf-8');
    return new BEAR_Ro('<pre>' . print_r($values, true) . '</pre>', $headers);
}