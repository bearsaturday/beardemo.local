<?php
/**
 * This file is part of the beardemo.local package.
 *
 * @license http://opensource.org/licenses/bsd-license.php BSD
 */

/**
 * After test resource
 */
class App_Ro_Test_Aop_After extends App_Ro_Test_Aop
{
    /**
     * Read
     *
     * @return array
     * @aspect after App_Aspect_Test_After
     */
    public function onRead($values)
    {
        return parent::onRead($values);
    }
}
