# ページリソース

ページをリソースとして扱う事ができます。リソースのタイプは２つあります。pageのhttp出力結果をリソース結果とする'html' とページ上でsetされたリソースを値として利用する'resource'の２つです。
PHP Unitテスト等で使う事もできます。

App/Ro/Entryリソースはidを受け取って該当の記事リソースを返します。

### 「記事リソース」を利用するページ
ライブデモ

[htdocs/db/select/item.php](/htdocs/db/select/item.php)は上記リソースをページにしてHTML表示します

### 「「記事リソース」を利用するページ」を利用するページ
ライブデモ

[htdocs/resource/page.php](/htdocs/resource/page.php)は上記ページをリソースとして扱いHTML表示します。

UAコードを変えDefault(PC)とDocomoの場合の両方のHTMLを取得しています。

### 「「「記事リソース」を利用するページ」を利用するページ」を利用するページ
ライブデモ

[htdocs/resource/page/page.php](/htdocs/resource/page/page.php)は上記ページを更にリソースとして扱いHTML表示します。
