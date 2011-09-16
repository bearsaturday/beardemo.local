<?php
/**
 * App
 *
 * @category   BEAR
 * @package    bear.demo
 * @subpackage Ro
 * @author     $Author:$ <username@example.com>
 * @license    @license@ http://@license_url@
 * @version    Release: @package_version@ $Id:$
 * @link       http://@link_url@
 */

/**
 * Thorowing test resource
 *
 * @category   BEAR
 * @package    bear.demo
 * @subpackage Ro
 * @author     $Author:$ <username@example.com>
 * @license    @license@ http://@license_url@
 * @version    Release: @package_version@ $Id:$
 * @link       http://@link_url@
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