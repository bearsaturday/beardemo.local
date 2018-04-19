<?php


/**
 * POEテスト用リソース
 */
class App_Ro_Test_Poe extends BEAR_Ro
{
    protected $_result = array();

    /**
     * Inject
     */
    public function onInject()
    {
        parent::onInject();
    }

    /**
     * Read
     *
     * @param array $values
     *
     * @return array
     */
    public function onCreate($values)
    {
        echo '<h2>リソースを作成しました</h2>';
    }
}
