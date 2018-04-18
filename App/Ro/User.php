<?php
/**
 * This file is part of the beardemo.local package.
 *
 * @license http://opensource.org/licenses/bsd-license.php BSD
 */

/**
 * ユーザーリソース
 *
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
        $result = array();
        $result[1] = array('id' => 1, 'name' => 'Athos', 'age' => 15, 'blog_id' => 11, 'photo_id' => 1);
        $result[2] = array('id' => 2, 'name' => 'Aramis', 'age' => 16, 'blog_id' => 12, 'photo_id' => 2);
        $result[3] = array('id' => 3, 'name' => 'Porthos', 'age' => 17, 'blog_id' => 13, 'photo_id' => 3);

        return $result[$values['id']];
    }

    /**
     * Link
     *
     * @return array
     */
    public function onLink($values)
    {
        $links = array();
        $links['blog'] = array('uri' => 'User/Blog', 'values' => array('id' => $values['blog_id']), 'options' => array());
        $links['photo'] = array('uri' => 'User/Photo', 'values' => array('id' => $values['photo_id']), 'options' => array());
//        $links['photo'] = array('uri' => "User/Photo?id={$values['photo_id']}");
        return $links;
    }
}
