<?php


/**
 * コメントリソース
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
        $result = [];
        $result[] = ['id' => $id, 'title' => "{$title}1(ID={$id})"];
        $id++;
        $result[] = ['id' => $id, 'title' => "{$title}2(ID={$id})"];
        $id++;

        return $result;
    }

    /**
     * Link
     *
     * @param array $values
     *                      s
     *
     * @return array
     * @required id
     */
    public function onLink($values)
    {
        $links = [];
        $links['thumb'] = ['uri' => 'User/Blog/Entry/Comment/Thumb', 'values' => ['comment_id' => $values['id']]];

        return $links;
    }
}
