<?php
/**
 * This file is part of the beardemo.local package.
 *
 * @license http://opensource.org/licenses/bsd-license.php BSD
 */

/**
 * 最新記事リソース
 */
class App_Ro_User_Blog_New extends App_Ro
{
    /**
     * Read
     *
     * @return array
     */
    public function onRead($values)
    {
        $result = array();
        $result[11] = array('blog_id' => 11, 'title' => 'Athos Blog Latest Entry');
        $result[12] = array('blog_id' => 12, 'title' => 'Aramis Blog Latest Entry');
        $result[13] = array('blog_id' => 13, 'title' => 'Porthos Blog Latest Entry');

        return $result[$values['id']];
    }
}
