# フォーム

ライブデモ

サーバーサイドのPEAR::QuickFormをAJAXで取り扱います。フォームのリクエスト、バリデーション、結果の反映、がAJAXで行われます。サーバーサイドでのバリデーションなのでバリデーションをJS、PHPの双方で用意する必要がありません。

またフォームがAJAXフォームであるという依存はインジェクタで注入されるので、フォームのbuild本体に変更はなく、テンプレートも同じです。エラーはCSSで表現されます。

バリデーションの必要のないフォームはAJAX Linkで対応できます。その場合、サーバーサイドでのフォームの組み立てが必要ありません。

 * ページ [htdocs/ajax/form/index.php](/htdocs/ajax/form/index.php)
 * フォーム [App/Form/Ajax.php](/App/Form/Ajax.php)
 * JS [htdocs/js/app.js](/htdocs/js/app.js)
 * CSS [htdocs/css/app.css](/htdocs/css/app.css)
 * テンプレート [ages/ajax/form/index.tpl](/ages/ajax/form/index.tpl)
