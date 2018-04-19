<?php


/**
 * Thorowing test resource
 */
class App_Ro_Test_Db_Entry extends App_Ro
{
    /**
     * テーブル名
     *
     * @var string
     */
    protected $_table = 'entries_test';

    /**
     * Inject
     */
    public function onInject()
    {
        parent::onInject();
        $this->_queryConfig['pager'] = 1; // DBページャー利用
        $this->_queryConfig['perPage'] = 5; // １ページ毎のアイテム数
        $this->_queryConfig['deleted_at'] = true; // SELECTで論理削除の使用
        $id = array('id', 'id', '-');
        $date = array('created_at', 'date', '-');
        $this->_queryConfig['sort'] = array($id, $date); // ソート
        $this->_query = BEAR::factory('BEAR_Query', $this->_queryConfig);
    }

    /**
     * Create
     *
     * @param array $values
     *
     * @required title
     * @required body
     *
     * @aspect App_Aspect_Transaction
     *
     * @throws App_Ro_Test_Db_Entry_Exception 投稿できない例外
     */
    public function onCreate($values)
    {
        //db
        $values['created_at'] = _BEAR_DATETIME; //現在時刻
        $result = $this->_query->insert($values);
        if ($this->_query->isError($result)) {
            throw $this->_exception('投稿できませんでした');
        }
    }

    /**
     * Update
     *
     * @param array $values
     *
     * @return $array
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
     * @return $array
     */
    public function onRead($values)
    {
        $sql = "SELECT * FROM {$this->_table}";
        $result = $this->_query->select($sql, array(), $values);

        return $result;
    }

    /**
     * Delete
     *
     * @param array $values
     *
     * @return array
     * @required id
     */
    public function onDelete($values)
    {
        $values['deleted_at'] = _BEAR_DATETIME;
        $where = 'id = ' . $this->_query->quote($values['id'], 'integer');
        $result = $this->_query->update($values, $where);

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
        $links['info'] = array('uri' => 'Entry/Info', 'values' => $values);

        return $links;
    }
}
