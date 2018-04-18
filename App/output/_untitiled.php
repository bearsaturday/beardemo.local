<?php
/**
 * This file is part of the beardemo.local package.
 *
 * @license http://opensource.org/licenses/bsd-license.php BSD
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
