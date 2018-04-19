# セットオプション

リソースをpageにsetするのにオプションがいくつか利用できます。

```php
$this->_resource->read($params1)->set('entry1', 'value'); $this->_resource->read($params2)->set('entry2', 'object'); $this->_resource->read($params3)->set('entry3', 'lazy');
```

| オプションキー | セットされるもの (Value or Ro) | Eager or Lazy |
|:--------|:------------------------|:--------------| 
| 'value' | Value(スカラー値 or 連想配列) | eager | 
| 'object' | Resource Object | eager |
| 'lazy' | Resource Object | lazy |

## Value or Object
 * Valueは単純な変数のset(push)です。Lazy setはできません。
* ObjectはArrayObjectを継承したBEAR_Roです。配列としてforeachでbodyがループできる一方、オブジェクトとしてメソッドを使用することもできます。リソースリクエスト時にイテレータオプション(iterator)を指定することもできます。

## Eager or Lazy
 * Eager setはリソースリクエストがonInit終了時に行われテンプレートにsetされます。lazyはテンプレートにsetした変数が出現するまで実リソースリクエストは実行されません。
 * Lazy setはinitキャッシュ時にキャッシュされますが、lazyはinit時にはリクエストが発生するかどうか確定していないため、キャッシュはされません。一方もしかしたらviewで出現しないかもしれないリソースはlazyでsetしておくとリソースリクエストコストが無駄になりません。
 * Lazy setはPC/携帯を同一ページにした場合などにも有用です。PC用でlazyセットしておいてUA別テンプレートでsetした変数の出現に合わせてリソースリクエストが行われます。ページ側でUA別のインジェクトやif, switchなどの条件分岐が不要です。

## Push or Pull
 * リソースリクエストがpageで行われviewに結果がsetされるのがリソースプPush、viewからリソースにリクエストされるのがリソースPullです。{resource}プラグインを使ってPageでのリソースsetなしにリソースPullすることができます。

## リソースデバック表示
 * リソースデバックを使うと以下の様にテンプレート付リソースオブジェクトがリソースデバック表示されます
 * 破線がリソーステンプレートエリアを表わし、Valueクエリー付URIとリソーステンプレートが表示されます。
 * リソーステンプレートはクリックするとオンラインで編集できます。
 * app.ymlでBEAR_Roにshow_box: trueをセットするとデバック時は常時表示されます。それ以外の場合はデバックモードで?_resourceクエリーを付加すると表示されます。

http://beardemo.kumasystem.com/image/_resource.png

 * ページ htdocs/resource/set/index.php
 * リソーステンプレート App/views/elements/list/entry.tpl
 * ページテンプレート App/views/pages/resource/set/index.tpl
