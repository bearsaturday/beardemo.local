{* ユーザーにブログ、記事、コメント、コメント評価がリンクされています *}

<h3>ユーザー</h3>
    <ul>
        <li class="name">{$body.user.name}</li>
        <li class="age">{$body.user.age}</li>
    </ul>
<h3>ブログ</h3>
    <ul>
        <li class="blog">{$body.blog.name}</li>
    </ul>
{* ブログ *}
<div id="blog">
<h3>記事</h3>
<ul>
{foreach item=entry from=$body.db_entry}
    {* 記事 *}
    <li class="entry"><span class="title">{$entry.title}</span>&nbsp<span class="body">{$entry.body}</span></li>
{/foreach}
</ul>

</div>

