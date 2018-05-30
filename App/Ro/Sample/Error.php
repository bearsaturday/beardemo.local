<?php


/**
 * エラーリソース
 *
 * <p>リソースエラーを発生させるサンプルです。
 * クライアント(Page/CLI)がリソースをアクセスし、帰ってくるオブジェクト(Ro)は正常/エラーに関わらずリソースオブジェクト(RO)が返ってきます。
 * エラーコードは以下の２種類だけです。</p>
 *
 * 400 (BEAR::CODE_BAD_REQUEST)
 * 500 (BEAR::CODE_ERROR)
 */
class App_Ro_Sample_Error extends App_Ro
{
    /**
     * Read - Bad Requestエラーサンプル
     *
     * 下記@requiredアノテーションで$values['name']と$values['age']両方のパラメータが必須になっています。
     * ないとコード400(BEAR::CODE_BAD_REQUEST)ののエラーROオブジェクトの返されます。
     *
     * @param array $values
     *
     * @return string
     * @required name
     * @required age
     */
    public function onRead($values)
    {
        return "My name is {$values['name']}, {$values['age']} yesrs old.";
    }

    /**
     * Create - 例外発生サンプル
     *
     * PEARやZendなど外部ライブラリを利用したときに発生した例外をそのまま返すと
     * その例外はクライアントにコード500(=BEAR::CODE_ERROR)のリソースオブジェクトとして返ります
     *
     * @param array $values
     *
     * @throws Exception テスト例外
     */
    public function onCreate($values)
    {
        throw new Exception('普通の例外をなげる');
    }

    /**
     * リソース内部エラー
     *
     * リソース内部でエラーが起きたときはコード500(=BEAR::CODE_ERROR)の例外を発生させます。
     *
     * @param array $values
     *
     * @throws App_Ro_Sample_Error_Exception 更新不可例外
     */
    public function onUpdate($values)
    {
        $msg = '現在一切の更新はできません';
        $info = ['date' => _BEAR_DATETIME];
        throw $this->_exception(
            $msg,
            [
            'code' => BEAR::CODE_ERROR,
            'info' => $info]
        );
    }

    /**
     * Delete
     *
     * <p>PEARエラーはそのまま返すとクライントはエラーRoオブジェクトで受け取ります。
     * PEARライブラリ使用の時に結果を確認することなくreturnしても、受け取った側はエラーRoオブジェクトとして処理できます。</p>
     *
     * @param array $values
     *
     * @return PEAR_Error
     */
    public function onDelete($values)
    {
        return PEAR::raiseError('PEARエラーです');
    }
}
