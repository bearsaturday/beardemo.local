<?php


/**
 * Advice
 */
class App_Aspect_Test_Before implements BEAR_Aspect_Before_Interface
{
    /**
     * beforeアドバイス
     *
     * @param array                 $values    リソースパラメータ（引数）
     * @param BEAR_Aspect_JoinPoint $joinPoint ジョインポイント
     *
     * @return array
     */
    public function before(array $values, BEAR_Aspect_JoinPoint $joinPoint)
    {
        $values['id'] = 2;

        return $values;
    }
}
