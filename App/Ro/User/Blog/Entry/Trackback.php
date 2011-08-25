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
 * トラックバックリソース
 *
 * @category   BEAR
 * @package    bear.demo
 * @subpackage Ro
 * @author     $Author:$ <username@example.com>
 * @license    @license@ http://@license_url@
 * @version    Release: @package_version@ $Id:$
 * @link       http://@link_url@
 */
class App_Ro_User_Blog_Entry_Trackback extends App_Ro
{
    /**
     * Read
     *
     * @param array $values
     *
     * @return array
     * @requied id
     */
    public function onRead($values)
    {
        $id = 50 + $values['entry_id'];
        $title = "記事ID({$values['entry_id']})のトラックバック";
        $result = array();
        $result[] = array('id' => $id, 'title' => "{$title}$id");
        $id++;
        $result[] = array('id' => $id, 'title' => "{$title}$id");
        $id++;
        $result[] = array('id' => $id, 'title' => "{$title}$id");
        $id++;
        return $result;
    }
}