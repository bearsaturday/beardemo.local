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
 * ブログエントリーリソース
 *
 * @category   BEAR
 * @package    bear.demo
 * @subpackage Ro
 * @author     $Author:$ <username@example.com>
 * @license    @license@ http://@license_url@
 * @version    Release: @package_version@ $Id:$
 * @link       http://@link_url@
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
        $result = array();
        $result[] = array('id' => 100, 'title' => "{$title}1(ID=20)");
        $result[] = array('id' => 101, 'title' => "{$title}2(ID=21)");
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
        $links = array();
        $links['comment'] = array(
            'uri' => 'User/Blog/Entry/Comment',
            'values' => array('entry_id' => $values['id'])
        );
        $links['trackback'] = array(
            'uri' => 'User/Blog/Entry/Trackback',
            'values' => array('entry_id' => $values['id'])
        );
        return $links;
    }
}
