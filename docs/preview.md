# 確認画面つきフォーム

確認画面つきフォームライブデモ

プレビュー（確認）画面を利用するフォームです。フォームが最初に表示される初期表示、フォームの内容が変更できない確認表示、確認後送信の最終表示と３つのフォームの状態をフォームのインジェクターを変えることにより実現しています。

オリジナルエレメント
フリーズ時の表示をより標準的に見せるBEARオリジナルのエレメントbcheckbox, bradioが利用できます。[x]表示ではなく選択されたものだけがスペースをセパレータにして表示される点がオリジナルと違います。

例)

## checkbox

[x]旅行 [ ]写真 [x]音楽 [ ]映画

## bcheckbox

旅行 音楽

## radio

[x] Yes [ ]No

## bradio

Yes

 * ページ htdocs/form/preview/index.php
 * フォーム App/Form/Preview.php
 * テンプレート(最初の画面) [App/views/pages/form/preview/index.tpl](/App/views/pages/form/preview/index.tpl)
 * テンプレート(確認画面) [App/views/pages/form/preview/preview.tpl](/App/views/pages/form/preview/preview.tpl)
 * テンプレート(送信後画面) [App/views/pages/form/preview/action.tpl](/App/views/pages/form/preview/action.tpl)
