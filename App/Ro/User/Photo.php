<?php
/**
 * App
 *
 * @category   BEAR
 * @package    bear.demo
 * @subpackage Ro
 * @author     $Author:$ <username@example.com>
 * @license    @license@ http://@license_url@
 * @version    Release: @package_version@ $Id:$
 * @link       http://@link_url@
 */

/**
 * 写真サービスリソース
 *
 * @category   BEAR
 * @package    bear.demo
 * @subpackage Ro
 * @author     $Author:$ <username@example.com>
 * @license    @license@ http://@license_url@
 * @version    Release: @package_version@ $Id:$
 * @link       http://@link_url@
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