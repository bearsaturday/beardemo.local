<?php


/**
 * ユーザーリソース
 */
class App_Ro_User extends App_Ro
{
    /**
     * Read
     *
     * @required id
     *
     * @return array
     */
    public function onRead($values)
    {
        $result = [];
        $result[1] = ['id' => 1, 'name' => 'Athos', 'age' => 15, 'blog_id' => 11, 'photo_id' => 1];
        $result[2] = ['id' => 2, 'name' => 'Aramis', 'age' => 16, 'blog_id' => 12, 'photo_id' => 2];
        $result[3] = ['id' => 3, 'name' => 'Porthos', 'age' => 17, 'blog_id' => 13, 'photo_id' => 3];

        return $result[$values['id']];
    }

    /**
     * Link
     *
     * @return array
     */
    public function onLink($values)
    {
        $links = [];
        $links['blog'] = ['uri' => 'User/Blog', 'values' => ['id' => $values['blog_id']], 'options' => []];
        $links['photo'] = ['uri' => 'User/Photo', 'values' => ['id' => $values['photo_id']], 'options' => []];
//        $links['photo'] = array('uri' => "User/Photo?id={$values['photo_id']}");
        return $links;
    }
}
