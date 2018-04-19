# アスペクト指向（AOP）

リソースはアノテーションでアスペクト指向プログラミングのアドバイスといわれる横断的処理を適用することができます。

デモはオリジナルのリソースに以下のそれぞれのアドバイスを適用したものです

| アドバイスタイプ | 説明 | デモでの動作 |
|:-------------|:-------|:-----------| 
| before | 入力時の処理 | 入力のIDを3に変更 | 
| after | 出力時の処理 | 出力にageプロパティを付加 |
| around | 入出力をはさんだ処理 | タイマー処理 | 
| returning | エラーが出なかった場合のafter処理 | プロパティを追加 | 
| throwing | PEARエラーや例外が発生した場合のafter処理 | エラーの代わりのリソース作成 |

ファイル
 * [ページ](/htdocs/test/aop.php)
 * [テンプレート](/App/views/pages/test/aop.tpl)
 
リソース
 * [オリジナルリソース](/App/Ro/Test/Aop.php)
 * [Beforeアドバイス適用リソース](/App/Ro/Test/Aop/Before.php)
 * [Afterアドバイス適用リソース](/App/Ro/Test/Aop/After.php)
 * [Aroundアドバイス適用リソース](/App/Ro/Test/Aop/Around.php)
 * [Returningアドバイス適用リソース](/App/Ro/Test/Aop/Returning.php)
 * [Throwingアドバイス適用リソース](/App/Ro/Test/Aop/Throwing.php)
 * [全てのアドバイス適用したリソース](/App/Ro/Test/Aop/All.php)
 
アドバイス
 * [Beforeアドバイス](/App/Aspect/Test/Before.php)
 * [Afterアドバイス](/App/Aspect/Test/After.php)
 * [Aroundアドバイス](/App/Aspect/Test/Around.php)
 * [Returningアドバイス](/App/Aspect/Test/Returning.php)
 * [Throwingアドバイス](/App/Aspect/Test/Throwing.php)
