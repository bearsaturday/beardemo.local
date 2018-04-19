# SELECT

DBのデータをBEAR_QueryクラスのクエリーツールでSELECTしています。DBオブジェクトはPEAR::MDB2を利用しています。

## リソース読み込み

 * DBからデータを読み込むのにBEAR_Queryツールを使っています。MDB2で生成したDBオブジェクトに対してBEAR_QueryツールがSQLを生成してアクセスしています。
 * インジェクターでクエリーツールのインスタンスを注入しています。この時どういう風にクエリーツールを動作させるかをコンストラクタの$configに渡しています。
 * DBページャーやLIMIT文などSQLの依存がonRead()メソッドから取り除けています。基本となるSQLを記述するだけです。
 * DBページャーに対応しています
 * 表示順がクエリーに応じて変わります。
 * 全体取得（all/リスト）と個別取得(item/アイテム)に対応しています。
 * SQLはクエリーツールを使用しないでフルスクラッチでも記述できます。
 * ここで例としてあげてるのは”何を”の部分(=WHERE句より前の部分をテキスト)で直接記述して、どのように（=ODERBY やLIMIT)をBEAR_Queryクラスのクエリーツールを使って生成しています。

```php
// リソース読み込み
public function onRead($values)
{
    $sql = "SELECT * FROM entries";
    $result = $this->_query->select($sql, array(), $values);
    
    return $result;
}
```

## クエリーツール

ソートとLIMITとDBページャー
どういう順、あるいはどのくらいの数のリソース状態を表現するかというLIMITやORDER BYという句で表される部分は、より本質的な SELECT ~ WHEREの部分と比べて自動生成がしやすいようになっています。

何故かというと例えばユーザーの一覧のリソースを考えたときそれが新しい順であるか、上位１０件しか表示してないといった事は「リソース状態の表現の方法が違うだけ」と考えられる場合が多いからです。

## DBページャーとLIMIT

```php
$this->_queryConfig['pager'] = 1; // DBページャー利用 $this->_queryConfig['perPage'] = 5; // １ページ毎のアイテム数 この組み合わせでDBページャー利用になります。テンプレートに{$pager}がアサインされます。内容は{$pager|printa}で確認できます $this->_queryConfig['pager'] = 0; // DBページャー不使用、LIMIT文 $this->_queryConfig['perPage'] = 5; // １ページ毎のアイテム数 この組み合わせだとLIMIT文の生成のみになります。上から５件だけのデータを返します。ページャーリンクも入っている{$pager}はアサインされません。 $this->_queryConfig['deleted_at'] = true; // SELECTで論理削除の使用 WHERE deleted_at IS NOT NULLが付加されます。deleted_atカラムを削除日付カラムとして使用します。
```

## ソート

クエリーソートの機能です。クエリーに対応したソートをしたり、デフォルトでのソート順を指定することができます。

```php
$id = array($privateColumn, $publicGet, $dir);
```

などと３つの配列で指定します。

| $privateColumn | string | DBカラム名 |
|:---------------|:-------|:-------|
| $publicGet | string | $_GETクエリーキー　|
| $dir | string | 降順昇順 | '+'または'-' |

```php
$id = array('id', 'id', '+'); $date = array('created_at', 'date', '-'); $this->_queryConfig['sort'] = array($id, $date); // ソート
```

`$_GET`クエリーに$publicGetが存在すればその方向でソートされます。-クエリーキーの前にがついていれば降順です。_

```php
?_sort=-id
```

複数のソートはカンマで区切ります。

```php
?_sort=id,-date
```

DBのカラム名と違うキーでソートを行う場合には$publicGetKeyにcolumnNameと違う名前をつけます。$dirは+は昇順、-は降順です。

 * ページ [htdocs/db/select/index.php](/htdocs/db/select/index.php)
 * リソース [App/Ro/Entry.php](/App/Ro/Entry.php)
 * Appリソース [App/Ro.php](/App/Ro.php)
 * テンプレート [App/views/pages/db/select/index.tpl](/App/views/pages/db/select/index.tpl)
 
