<?php
/**
 * This file is part of the beardemo.local package.
 *
 * @license http://opensource.org/licenses/bsd-license.php BSD
 */

/**
 * Advice
 */
class App_Aspect_Test_Returning implements BEAR_Aspect_Returning_Interface
{
    /**
     * afterアドバイス
     *
     * @param array                 $result
     * @param BEAR_Aspect_JoinPoint $joinPoint
     *
     * @return array
     */
    public function returning($result, BEAR_Aspect_JoinPoint $joinPoint)
    {
        $result['is_no_problem'] = true;

        return $result;
    }
}
