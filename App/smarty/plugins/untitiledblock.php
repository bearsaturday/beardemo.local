<?php
/**
 * App
 *
 * @category   BEAR
 * @package    bear.demo
 * @subpackage Smarty
 * @author     $Author:$ <username@example.com>
 * @license    @license@ http://@license_url@
 * @version    Release: @package_version@ $Id:$
 * @link       http://@link_url@
 */

/**
 * Untitle block plugin
 *
 * @param string $params  パラメーター
 * @param string $content HTML
 * @param Smarty &$smarty &Smarty object
 * @param bool   &$repeat &$repeat 呼び出し回数
 *
 * @return string
 */
function smarty_block_untitled($params, $content, &$smarty, &$repeat)
{
    return $content;
}
