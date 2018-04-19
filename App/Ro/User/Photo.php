<?php
/**
 * This file is part of the beardemo.local package.
 *
 * @license http://opensource.org/licenses/bsd-license.php BSD
 */

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
        $result = array();
        $result[1] = array('id' => 11, 'name' => 'Athos Photo');
        $result[2] = array('id' => 12, 'name' => 'Aramis Photo');
        $result[3] = array('id' => 13, 'name' => 'Porthos Photo');

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
        $links['album'] = array('uri' => 'User/Photo/Album', 'values' => array('photo_id' => $values['id']));

        return $links;
    }
}
