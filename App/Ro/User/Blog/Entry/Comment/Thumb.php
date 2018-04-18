<?php
/**
 * This file is part of the beardemo.local package.
 *
 * @license http://opensource.org/licenses/bsd-license.php BSD
 */

/**
 * コメント評価リソース
 *
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
