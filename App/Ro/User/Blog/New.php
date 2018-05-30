<?php


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
        $result = [];
        $result[11] = ['blog_id' => 11, 'title' => 'Athos Blog Latest Entry'];
        $result[12] = ['blog_id' => 12, 'title' => 'Aramis Blog Latest Entry'];
        $result[13] = ['blog_id' => 13, 'title' => 'Porthos Blog Latest Entry'];

        return $result[$values['id']];
    }
}
