<?php
/**
 * This file is part of the beardemo.local package.
 *
 * @license http://opensource.org/licenses/bsd-license.php BSD
 */

/**
 * rateリソース
 *
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
