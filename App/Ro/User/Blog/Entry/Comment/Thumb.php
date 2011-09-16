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
 * コメント評価リソース
 *
 * @category   BEAR
 * @package    bear.demo
 * @subpackage Ro
 * @author     $Author:$ <username@example.com>
 * @license    @license@ http://@license_url@
 * @version    Release: @package_version@ $Id:$
 * @link       http://@link_url@
 */
class App_Ro_User_Blog_Entry_Comment_Thumb extends App_Ro
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
        static $id = 120;

        $title = "コメントID({$values['comment_id']})の評価";
        $result = array();
        $result[] = array('id' => $id, 'title' => "{$title}(ID={$id})");
        $id++;
        $result[] = array('id' => $id, 'title' => "{$title}(ID={$id})");
        $id++;
        $result[] = array('id' => $id, 'title' => "{$title}(ID={$id})");
        $id++;
        return $result;
    }
}