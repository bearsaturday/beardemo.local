<?php


/**
 * ブログサービスリソース
 */
class App_Ro_User_Blog extends App_Ro
{
    /**
     * Read
     *
     * @param array $values
     *
     * @return array
     * @required id
     */
    public function onRead($values)
    {
        $result = [];
        $result[11] = ['id' => 11, 'name' => 'Athos Blog'];
        $result[12] = ['id' => 12, 'name' => 'Aramis Blog'];
        $result[13] = ['id' => 13, 'name' => 'Porthos Blog'];

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
        $links['new'] = ['uri' => 'User/Blog/New', 'values' => ['id' => $values['id']], 'options' => []];
        $links['entry'] = ['uri' => 'User/Blog/Entry', 'values' => ['blog_id' => $values['id']]];
        $links['db_entry'] = ['uri' => 'Entry'];

        return $links;
    }
}
