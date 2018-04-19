# セッション

php標準のセッションは標準の動作としてexpire時間なるとセッション情報が消去されますが、`PEAR::HTTP_Session`を利用する`BEAR_Session`ではセッションが即削除される代わりに特定クラスをコールバックすることができます。

コールバック先で再度パスワードの入力を求めたり、セッションを延長するかなどの処理をすることが可能です。

※3秒のidleでセッションが切れるデモです。タイムアウトすると延長するかログアウトするか選べます。

詳細
BEAR_Sessionの$configを以下のように設定しています。

```yaml
BEAR_Session:
  # mixed アダプター0 なし | 1 File | 2 DB | 3 memchache
  adaptor: 1
  # path: dsn | session file path | memcache host(s)
  path: '/tmp/sess';
  # int アイドル時間
  idle : 3
  callback:
   -'App_Session'
   -'onSessionTimeout'
```

操作がない一定時間（idleタイム）とコールバックされるcallbackを'callback' configで指定します。 このdemoでは`App_Session::onSessionTimeOut()`を指定しています。

`App_Session::onSessionTimeOut()`ではセッション時間延長、ログアウト、セッションタイムアウト画面表示をクエリーで出し分けています。

* ページ [htdocs/test/session/file.php](/htdocs/test/session/file.php)
* セッションクラス [App/Session.php](/App/Session.php)
* テンプレート [App/views/pages/test/session/file.tpl](/App/views/pages/test/session/file.tpl)
* テンプレート [App/views/pages/test/session/get.tpl](/App/views/pages/test/session/get.tpl)
