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
 * ブログサービスリソース
 *
 * @category   BEAR
 * @package    bear.demo
 * @subpackage Ro
 * @author     $Author:$ <username@example.com>
 * @license    @license@ http://@license_url@
 * @version    Release: @package_version@ $Id:$
 * @link       http://@link_url@
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
        $result = array();
        $result[11] = array('id' => 11, 'name' => 'Athos Blog');
        $result[12] = array('id' => 12, 'name' => 'Aramis Blog');
        $result[13] = array('id' => 13, 'name' => 'Porthos Blog');
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
        $links['new'] = array('uri' => 'User/Blog/New', 'values' => array('id' => $values['id']), 'options' => array());
        $links['entry'] = array('uri' => 'User/Blog/Entry', 'values' => array('blog_id' => $values['id']));
        $links['db_entry'] = array('uri' => 'Entry');
        return $links;
    }
}