<?php

require_once 'App.php';

/**
 * AOPテスト
 */
class Page_Test_Aop extends App_Page
{
    public function onInit(array $args)
    {
        $values = ['id' => 1];
        // オリジナル
        $params = ['uri' => 'Test/Aop', 'values' => $values];
        $this->_resource->read($params)->set('original');
        // before アドバイス
        $params = ['uri' => 'Test/Aop/Before', 'values' => $values];
        $this->_resource->read($params)->set('before');
        // after アドバイス
        $params = ['uri' => 'Test/Aop/After', 'values' => $values];
        $this->_resource->read($params)->set('after');
        // around アドバイス
        $params = ['uri' => 'Test/Aop/Around', 'values' => $values];
        $this->_resource->read($params)->set('around');
        // returning アドバイス
        $params = ['uri' => 'Test/Aop/Returning', 'values' => $values];
        $this->_resource->read($params)->set('returning');
        // throwing アドバイス (1)
        $params = ['uri' => 'Test/Aop/Throwing', 'values' => $values];
        $this->_resource->read($params)->set('throwing');
        // throwing アドバイス (2)
        $params = ['uri' => 'Test/Aop/Throwing2', 'values' => $values];
        $this->_resource->read($params)->set('throwing2');
        // 上記全てのアドバイスを適用したAll
        $params = ['uri' => 'Test/Aop/All', 'values' => $values];
        $this->_resource->read($params)->set('all');
        // 同じアドバイスの流用
        $values = ['id' => 3];
        $params = ['uri' => 'Test/Aop/Around2', 'values' => $values];
        $this->_resource->read($params)->set('around2');
    }
}

App_Main::run('Page_Test_Aop');
