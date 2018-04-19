# CSVリソース

CSVファイルをリソースとして扱います。この例ではJPからダウンロードできる東京都の郵便番号CSVをページングして閲覧できます。ページやテンプレートから見ればDBのデータでもCSVファイルでもほとんど相違がありません。

大きなファイルなので一度目に開くときは読み込みとパースに時間がかかりますが、キャッシュ利用しているのでその後の操作は問題ありません。

CSV以外にもXML, YAML, iniファイルが同様にスタティックな配列ファイルとして使えます。

* ページ [htdocs/resource.php](/htdocs/resource.php)
* CSVリソース [App/Ro/Post/tokyo.csv](/App/Ro/Post/tokyo.csv)
* テンプレート [App/views/pages/resource/csv.tpl](/App/views/pages/resource/csv.tpl)
