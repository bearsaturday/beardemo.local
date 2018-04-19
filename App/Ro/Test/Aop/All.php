<?php


/**
 *  Before, after, around, and ret test resource
 */
class App_Ro_Test_Aop_All extends App_Ro_Test_Aop
{
    /**
     * Read
     *
     * @return array
     *
     * @aspect before    App_Aspect_Test_Before
     * @aspect after     App_Aspect_Test_After
     * @aspect around    App_Aspect_Test_Around
     * @aspect returning App_Aspect_Test_Returning
     * @aspect throwing  App_Aspect_Test_Throwing
     */
    public function onRead($values)
    {
        return parent::onRead($values);
    }
}
