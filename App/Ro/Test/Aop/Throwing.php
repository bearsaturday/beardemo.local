<?php


/**
 * Thorowing test resource
 */
class App_Ro_Test_Aop_Throwing extends App_Ro_Test_Aop
{
    /**
     * Read
     *
     * @return array
     *
     * @aspect throwing App_Aspect_Test_Throwing
     */
    public function onRead($values)
    {
        return PEAR::raiseError('pear error in App_Ro_Test_Aop_Throwing');
    }
}
