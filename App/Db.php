<?php


/**
 * Db
 */
class App_Db extends BEAR_Factory
{
    /**
     * DBインスタンス取得
     *
     * 親クラスのgetInstace()からDSNにDBドライバオブジェクトを取得
     *
     * @param string $dsn    DSN
     * @param array  $option オプション
     *
     * @return MDB2_Driver_Datatype_mysqli
     *
     * @required dsn
     */
    public function factory()
    {
        $options['default_table_type'] = 'INNODB';
        $options['use_transactions'] = true;
        $config = array('dsn' => $this->_config['dsn']);
        $config['options'] = $options;
        $db = BEAR::factory('BEAR_Mdb2', $config);
        /* @var $db BEAR_Mdb2 */
        // すべてのフィールド識別子が SQL 文中で自動的にクォート
        $db->setOption('quote_identifier', true);
        $db->loadModule('Extended');

        return $db;
    }
}
