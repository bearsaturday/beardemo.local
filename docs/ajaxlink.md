# AJAXリンク

BEARと連携したjQueryプラグイン jquer.bear.jsを使えばAJAXがより簡単、安全に実装できます。

ライブデモ

jquery.bear.jsというjQueryプラグインを使ってBEAR(PHP)と連携します。このサンプルではjQueryのセレクタを使ってrel="ajax"というAタグをAJAXリクエストを行うイベントリクエストに変えています。

PHP BEARではBEAR_Page_Ajaxサービスを使い、ajaxコマンドを発行しています。

 * ページ htdocs/ajax/link/index.php
 * AJAXページ htdocs/ajax/link/ajax.php
 * AJAXページ htdocs/ajax/link/ajax/html.php
 * AJAXページ htdocs/ajax/link/ajax/resource.php
 * JS htdocs/js/app.js
 * テンプレート App/views/pages/ajax/link/index.tpl
