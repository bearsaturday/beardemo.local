<?php
/**
 * This file is part of the beardemo.local package.
 *
 * @license http://opensource.org/licenses/bsd-license.php BSD
 */

/**
 * Thorowing2 test resource
 *
 */
class App_Ro_Test_Aop_Throwing2 extends App_Ro_Test_Aop
{
    /**
     * Read
     *
     *
     * @aspect throwing App_Aspect_Test_Throwing 例外テスト
     *
     * @throws Exception リソース例外
     */
    public function onRead($values)
    {
        throw new Exception('リソースで例外');
    }
}
