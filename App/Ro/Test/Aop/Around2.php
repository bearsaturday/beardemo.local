<?php


/**
 * around2 test resource
 */
class App_Ro_Test_Aop_Around2 extends App_Ro_Test_Aop
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
