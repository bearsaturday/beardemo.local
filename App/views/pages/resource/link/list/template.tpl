<h2>Resource Link Template</h2>
{* $blogはstring(HTML)として評価 *}
{$blog}

{* $blogをオブジェクトとして評価 *}
{if $blog->getCode() == 200}

{* $blogを連想配列として評価 *}
    <p>[{$blog.user.name}]のユーザーリソースは問題なく取得できました</p>
{/if}