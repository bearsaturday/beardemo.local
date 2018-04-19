# ウイザードフォーム

複数の画面で構成され、確認画面があるフォームです。
フォーム1 → フォーム2 → フォーム3 → 確認画面 → フォームアクション実行　と続きます。

それぞれのページでフォームのバリデーションを行いますが、確認画面から最終的な送信時にも全てのバリデーションを行います。

その際の確認画面やアクション実行時にもフォーム出力やバリデーションは再利用されます。フォームを再利用するためフォームのbuild部分をエレメントとボタンにわけています。確認画面ではフォーム１、２、３のボタン以外のエレメント部分を作成し、最後に送信ボタンを追加しています。

フォームの順送りには_clickというhiddenフィールドを使用しています。各画面でのフォームバリデーション通過時のonAction内でclickイベントを用いてリダイレクトし次のフォームがbuildされ画面表示されます。

 * ページ [htdocs/form/wizard/index.php](/htdocs/form/wizard/index.php)
 * フォーム1 [App/Form/Wizard/One.php](/App/Form/Wizard/One.php)
 * フォーム2 [App/Form/Wizard/Two.php](/[App/Form/Wizard/Two.php)
 * フォーム3 [App/Form/Wizard/Three.php](/App/Form/Wizard/Three.php)
 * 確認フォーム [App/Form/Wizard/Preview.php](/App/Form/Wizard/Preview.php)
 * ページテンプレート(フォーム共通画面) [App/views/pages/form/wizard/index.tpl](/App/views/pages/form/wizard/index.tpl)
 * テンプレート(送信後画面) [App/views/pages/form/wizard/action.tpl](/App/views/pages/form/wizard/action.tpl)
