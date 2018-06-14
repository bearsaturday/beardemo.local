<?php


/**
 * Page
 */
class App_Ro extends BEAR_Ro
{
    protected $_table = '';
    /**
     * DAO
     *
     * @var BEAR_MDB2
     */
    protected $_db;

    /**
     * Constructor
     *
     * @param array $config
     */
    public function __construct(array $config)
    {
        parent::__construct($config);
    }

    /**
     * Inject
     *
     * 操作によってDBオブジェクトを変更します。
     * read操作はdsnをslaveに、DBページャーを利用可能に。
     * その他操作はdsnをdefaultに、トランザクション可能にしExtendedモジュール読み込みます。
     */
    public function onInject()
    {
        $app = BEAR::get('app');
        assert(is_string($app['App_Db']['dsn']['default']));
        assert(is_string($app['App_Db']['dsn']['slave']));
        $options['default_table_type'] = 'INNODB';
        if ($this->_config['method'] === 'read') {
            $dsn = $app['App_Db']['dsn']['slave'];
            $config = ['dsn' => $dsn, 'options' => $options];
            $this->_db = BEAR::factory('BEAR_Mdb2', $config);
            $this->_queryConfig = [
                 'db' => $this->_db,
                 'ro' => $this,
                 'table' => $this->_table,
                 'pager' => 0,
                 'options' => ['accesskey' => true]
            ];
        } else {
            $dsn = $app['App_Db']['dsn']['default'];
            $options['use_transactions'] = true;
            $config = ['dsn' => $dsn, 'options' => $options];
            $this->_db = BEAR::factory('BEAR_Mdb2', $config);
            $this->_db->loadModule('Extended');
            $this->_queryConfig = ['db' => &$this->_db, 'ro' => &$this, 'table' => $this->_table];
        }
        // すべてのフィールド識別子が SQL 文中で自動的にクォート
        $this->_db->setOption('quote_identifier', true);
    }

    /**
     * SELECTクエリーInject
     *
     * SELECTクエリーをCOUNTに変更します
     */
    public function onInjectCount()
    {
        $this->onInject();
        $this->_query = BEAR::dependency('BEAR_Query_Count', $this->_queryConfig);
    }

    /**
     * DAO取得
     *
     * AOP用。トランザクションアドバイスがDBオブジェクトを取得するのに使用しています
     *
     * @return MDB2_Driver_Datatype_mysqli
     */
    public function getDb()
    {
        return $this->_db;
    }
}
