<?php


/**
 * 写真サービスリソース
 */
class App_Ro_User_Photo extends App_Ro
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
        $result[1] = ['id' => 11, 'name' => 'Athos Photo'];
        $result[2] = ['id' => 12, 'name' => 'Aramis Photo'];
        $result[3] = ['id' => 13, 'name' => 'Porthos Photo'];

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
        $links['album'] = ['uri' => 'User/Photo/Album', 'values' => ['photo_id' => $values['id']]];

        return $links;
    }
}
