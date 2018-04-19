<?php
/**
 * This file is part of the beardemo.local package.
 *
 * @license http://opensource.org/licenses/bsd-license.php BSD
 */

/**
 * Returning test resource
 */
class App_Ro_Test_Aop_Returning extends App_Ro_Test_Aop
{
    /**
     * Read
     *
     * @return array
     *
     * @aspect returning App_Aspect_Test_Returning
     */
    public function onRead($values)
    {
        return parent::onRead($values);
    }
}
