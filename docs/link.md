# リンク

## Introduction

リソースとリソースの関係をリソースに持たせることで、関係性のカプセル化ができます。リソースの結びつき方が変更になってもページクラス内の利用コードに変更はありません。

※HTMLページのaタグをイメージです。ページからページへの関係性はページ自身がaタグのhref内に持ち、ブラウザではクリックするだけでです。関係性はカプセル化され利用者（ブラウザ）はそのリンクを管理する必要がありません。

## アイテムとリスト
リソース結果が1つのものをアイテムリソース、アイテムリソースがまとまった複数のものをリストリソースと呼びます。（DBの'row'と'all'のイメージです。）

## アイテムリソースのリンク

## ライブデモ

 * ユーザー1 [/resource/link/pager.php?id=1](http://127.0.0.1:8080/resource/link/pager.php?id=1)
 * ユーザー2 [/resource/link/pager.php?id=1](http://127.0.0.1:8080/resource/link/pager.php?id=2)
 * ユーザー3 [/resource/link/pager.php?id=1](http://127.0.0.1:8080/resource/link/pager.php?id=3)

## ファイル

 * ページ [/htdocs/resource/link/pager.php](/htdocs/resource/link/pager.php)
 * ページテンプレート [/App/views/pages/resource/link/pager.tpl](/App/views/pages/resource/link/pager.tpl)

### リソース
 * ユーザーリソース [/App/Ro/User.php](/App/Ro/User.php)
 * ブログリソース [/App/Ro/User/Blog.php](/App/Ro/User/Blog.php)
 * 新着記事リソース [/App/Ro/User/Blog/New.php](/App/Ro/User/Blog/New.php)

## リストリソースのリンク

結果がリスト（複数行の配列）のリンクを使う事ができます。 リストリソースのリンクライブデモ

```php
$this->_resource->read($params)->link(array('photo', 'blog'))->link('entry')->link(array('trackback', 'comment'))->link('thumb')->p()->set();
```

上記のようにリソースがリンクされています。
※thumbはコメントに対する評価です（youtubeでの親指） 

 1. 配列でリンクしてあるものは、同一リソースからのリンクです。その後のリソースは格好内の一番後のリソースからしかリンクできません。
 1. アイテムリンクとリストリンクでset()でページにセットされる変数の構造が変わります。アイテムリソースはルートにリンク名でsetされますが、リストリソースの場合はリンク元のリソース結果の下にデータがリンクされます。下記参照するとわかりやすいと思います。

## ファイル

 * ページ [/htdocs/resource/link/collection.php](/htdocs/resource/link/collection.php)
 * ページテンプレート [/App/views/pages/resource/link/pager.tpl](/App/views/pages/resource/link/pager.tpl)

### リソース

 * ユーザーリソース（アイテム） [/App/Ro/User.php](/App/Ro/User.php)
 * 写真サービスリソース（アイテム） [/App/Ro/User/Photo.php](/App/Ro/User/Photo.php)
 * ブログサービスリソース（アイテム） [/App/Ro/User/Blog.php](/App/Ro/User/Blog.php)
 * 記事リソース（リスト） [/App/Ro/User/Blog/Entry.php](/App/Ro/User/Blog/Entry.php)
 * トラックバックリソース（リスト） [/App/Ro/User/Blog/Entry/Trackback.php](/App/Ro/User/Blog/Entry/Trackback.php)
 * コメントリソース（リスト） [/App/Ro/User/Blog/Entry/Comment.php](/App/Ro/User/Blog/Entry/Comment.php)
 * コメント評価リソース（リスト） [/App/Ro/User/Blog/Entry/Comment/Thumb.php](/App/Ro/User/Blog/Entry/Comment/Thumb.php)
