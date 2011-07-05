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
 * rateリソース
 *
 * @category   BEAR
 * @package    bear.demo
 * @subpackage Ro
 * @author     $Author:$ <username@example.com>
 * @license    @license@ http://@license_url@
 * @version    Release: @package_version@ $Id:$
 * @link       http://@link_url@
 */
class App_Ro_Rate extends App_Ro
{
    /**
     * テーブル名
     *
     * @var string
     */
    protected $_table = 'entries';

    /**
     * Update
     *
     * @param array $values
     *
     * @return array
     * @required id
     */
    public function onUpdate($values)
    {
        $values['created_at'] = _BEAR_DATETIME; //現在時刻
        $where = 'id = ' . $this->_query->quote($values['id'], 'integer');
        $result = $this->_query->update($values, $where);
        return $result;
    }

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
//        $sql = "SELECT * FROM {$this->_table}";
//        $result = $this->_query->select($sql, array(), $values);
        $result = 4;
        return $result;
    }
}