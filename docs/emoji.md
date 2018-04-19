# 絵文字

 * 絵文字デモ1(スタティック)
 * 絵文字デモ2(ダイナミック)

デモ１（スタティック）はテンプレートにスタティックな文字として埋め込まれてるものです。テンプレートキャッシュコンパイル時にのみ処理され、それ以降は生成コストがかかりません。UA毎に用意されるテンプレートキャッシュ埋込ですので違うキャリアの文字は混在できません。

デモ２（ダイナミック）はDBなどに格納された絵文字コード数値エンティティをUAに応じて出し分けるものです。絵文字数値エンティティは各キャリアで独立していて（Docomo, AUはSJIS, SBはUTF-8）１ページに混在することができます。

デモ1（スタティック）
 * ページ htdocs/test/emoji/static.php
 * テンプレート App/views/pages/test/emoji/static.tpl

デモ2（ダイナミック）
 * ページ htdocs/test/emoji/dynamic.php

 * 絵文字リソース（Docomo) App/Ro/Emoji/Docomo.php
 * 絵文字リソース（AU) App/Ro/Emoji/Ezweb.php
 * 絵文字リソース（Softbank) App/Ro/Emoji/Softbank.php
 * テンプレート App/views/pages/test/emoji/dynamic.tpl
 * テンプレートyml App/views/pages/test/emoji/dynamic.yml
