<?php

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
