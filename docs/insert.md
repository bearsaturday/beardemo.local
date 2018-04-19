# INSERT

 * フォームからサブミットしたデータをDBにinsertします。
 * insertのSQL文は連想配列から生成されます。
 * 変数のキーがフォームとDBのカラムで違うときはonCreate()内で個別に置換します。
 * アノテーションを使用してrequideバリデーションとトランザクションを行っています。

## リソースアノテーション

このリソースのonCreateメソッドには２種類のアノテーションが使われています。

```php
/**
 * リソース作成
 *
 * @required title 
 * @required body 
 * @aspect App_Aspect_Transaction 
 */
 public function onCreate($values) {
```

## @requiedアノテーション

`@required`は$valuesの入力で必須なキーを指定します。スペースを続けてコメントを書くこともできます。

## `@aspect`アノテーション

AOP（アスペクト指向プログラミング）の”アドバイス”を指定します。このアドバイスはonCreate文の前後の処理をを行う”アラウンドアドバイス”と呼ばれる種類のアドバイスで、onCreateメソッドの前にトランザクション開始、後にトランザクション終了という処理を行います。

## トランザクションアドバイスクラス

```php
class App_Aspect_Transaction implements BEAR_Aspect_Around_Interface
{
    /**
     * Aroudアドバイス
     */
    public function around(array $values, BEAR_Aspect_JoinPoint $joinPoint)
    {
        // 前処理
        $obj = $joinPoint->getObject();
        $db = $obj->getDb();
        $db->beginTransaction();
        // 元メソッドを実行
        $result = $joinPoint->proceed($values);
        // 後処理
        if (!MDB2::isError($result)) {
            $db->commit();
        } else {
            $db->rollback();
        }
        return $result;
    }
}
```

 * ページ [htdocs/db/insert/index.php](/htdocs/db/insert/index.php)
 * リソース [App/Ro/Entry.php](/App/Ro/Entry.php)
 * Appリソース [App/Ro.php](/App/Ro.php)
 * アドバイス [App/Aspect/Transaction.php](/App/Aspect/Transaction.php)
 * テンプレート [App/views/pages/db/insert/index.tpl](/App/views/pages/db/insert/index.tpl)
 * テンプレート [App/views/pages/db/insert/done.tpl](/App/views/pages/db/insert/done.tpl)
 * テンプレート [App/views/pages/db/insert/error.tpl](/App/views/pages/db/insert/error.tpl)
