# SmartValidateフォーム

BEARで`PEAR::HTML_QuickForm{を使用しないでフォームを取り扱うのは容易です。

元々BEARのフォーム処理が`validate()`だったら`onAction()`といったごく単純なフローしかもたないためで、この部分をpageで持ちます。これはそのサンプルでフォームのライブラリにはSmartyValidateを使用しています。

このSmartyValidateを`PEAR::HTML_QuickForm`の変わりに使うには、SmartyValidate, 3で記述されている点について注意/確認が必要です。

BEAR_Formが渡すonAction(array $submit)の$submitは`PEAR::HTML_QuickForm::exportValues()`では要素の安全な値のみを出力します。またアンダースコアで始まるエレメントはフォームのメタ情報ととらえ$submitに渡りません。QF以外を使うときにはこの点に配慮が必要です。リソース側がこのQFのフォーム出力の安全性に頼った実装になっている場合には(createで受け取った値を全て使うなど）特に注意が必要です。この点の不注意は深刻なセキュリティリスクをもたらします。

Pros:
 * デザインHTMLからの移植が容易

Cons:

 * ルールの登録にセッションを使ってる
 * 出力の安全性がアプリに任される部分がある
 * UA別のフォームレンダリングはできない
 * エレメントの動的な配置には対応しない
 * 1画面に複数のフォームのトラッキングにはアプリ側での要対応
 * 確認画面のエレメント要素の逆引き(1=>"男性"等）に対応していない。(HTML\_QuickForm::freeze()がない)

Files
* ページ [htdocs/form/smartyvalidate.php](htdocs/form/smartyvalidate.php)
* フォーム [App/Form/SmartyValidate.php](App/Form/SmartyValidate.php)
* フォームinterface [App/Form/Interface.php](App/Form/Interface.php)
* テンプレート [App/views/pages/form/smartyvalidate/index.tpl](App/views/pages/form/smartyvalidate/index.tpl)
* 送信後テンプレート [App/views/pages/form/smartyvalidate/action.tpl](App/views/pages/form/smartyvalidate/action.tpl)
