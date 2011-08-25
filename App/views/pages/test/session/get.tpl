取得したセッション情報=[{$test}]

{if !$test}<p style="color:red">セッション情報は破棄されています。</p>
<ul>
<li><a href="file.php">ファイルセッションテストへ</a></li>
<li><a href="db.php">DBセッションテストへ</a></li>
</ul>
{/if}