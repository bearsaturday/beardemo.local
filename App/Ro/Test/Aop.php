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
 * AOPリソース
 *
 * @category   BEAR
 * @package    bear.demo
 * @subpackage Ro
 * @author     $Author:$ <username@example.com>
 * @license    @license@ http://@license_url@
 * @version    Release: @package_version@ $Id:$
 * @link       http://@link_url@
 */
class App_Ro_Test_Aop extends BEAR_Ro
{
    /**
     *
     */
    protected $_result = array();

    /**
     * Inject
     *
     * @return void
     */
    public function onInject()
    {
        parent::onInject();
        $this->_result[1] = array('id' => 1, 'name' => 'BEAR');
        $this->_result[2] = array('id' => 2, 'name' => 'Kuma');
        $this->_result[3] = array('id' => 3, 'name' => 'クマ');
    }

    /**
     * Read
     *
     * @param array $values
     *
     * @return array
     */
    public function onRead($values)
    {
        $id = $values['id'];
        return $this->_result[$id];
    }
}