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
 * コメントリソース
 *
 * @category   BEAR
 * @package    bear.demo
 * @subpackage Ro
 * @author     $Author:$ <username@example.com>
 * @license    @license@ http://@license_url@
 * @version    Release: @package_version@ $Id:$
 * @link       http://@link_url@
 */
class App_Ro_User_Blog_Entry_Comment extends App_Ro
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
        static $id = 110;

        $title = "記事ID({$values['entry_id']})のコメント";
        $result = array();
        $result[] = array('id' => $id, 'title' => "{$title}1(ID={$id})");
        $id++;
        $result[] = array('id' => $id, 'title' => "{$title}2(ID={$id})");
        $id++;
        return $result;
    }

    /**
     * Link
     *
     * @param array $values
     * s
     * @return array
     * @required id
     */
    public function onLink($values)
    {
        $links = array();
        $links['thumb'] = array('uri' =>  'User/Blog/Entry/Comment/Thumb', 'values' => array('comment_id' => $values['id']));
        return $links;
    }
}