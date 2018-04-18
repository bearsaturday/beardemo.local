<?php
/**
 * This file is part of the beardemo.local package.
 *
 * @license http://opensource.org/licenses/bsd-license.php BSD
 */

/**
 * Around resource
 *
 */
class App_Ro_Test_Aop_Around extends App_Ro_Test_Aop
{
    /**
     * Read
     *
     * @return array
     *
     * @aspect around App_Aspect_Test_Around
     */
    public function onRead($values)
    {
        return parent::onRead($values);
    }
}
