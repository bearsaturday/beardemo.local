<?php


/**
 * ブログエントリーリソース
 */
class App_Ro_User_Blog_Entry extends App_Ro
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
        $title = "ブログID({$values['blog_id']})の記事";
        $result = [];
        $result[] = ['id' => 100, 'title' => "{$title}1(ID=20)"];
        $result[] = ['id' => 101, 'title' => "{$title}2(ID=21)"];

        return $result;
    }

    /**
     * Link
     *
     * @param array $values
     *
     * @return array
     * @required id
     */
    public function onLink($values)
    {
        $links = [];
        $links['comment'] = [
            'uri' => 'User/Blog/Entry/Comment',
            'values' => ['entry_id' => $values['id']]
        ];
        $links['trackback'] = [
            'uri' => 'User/Blog/Entry/Trackback',
            'values' => ['entry_id' => $values['id']]
        ];

        return $links;
    }
}
