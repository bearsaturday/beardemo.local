# GD / iMagick / Cairo （画像加工）

[htdocs/image/change.php](/htdocs/image/change.php)

* [加工前画像](/htdocs/image/eye.png)
* GD/iMagick/Cairo画像ライブラリ変更ライブデモ
* クエリー付デモ （クエリー変えてためしてみてください)

画像をGD / iMagick / Cairoと画像ライブラリを切り替えながら操作できます。 GDは標準的、iMagickは写真等のラスター画像の操作に向いてて、CairoはSVGやフォントなどベクター画像の操作に向いてます。

このデモでは

 1. GDで画像で読み込みとリサイズ
 1. CairoでTrueTypeの文字にアウトライン付を付けて画像の上に合成し
 1. iMagickでポラロイド写真風に加工

してPNGに変換表示しています。

Note:

ライブラリ変更時のつかわれるtmpファイルはBEARが管理するのでユーザーは意識する必要がないようになっています。
