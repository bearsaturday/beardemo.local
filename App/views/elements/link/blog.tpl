{* ユーザーにブログ、記事、コメント、コメント評価がリンクされています *}

<h3>ユーザー</h3>
    <ul>
        <li>{$body.user.name}</li>
        <li>{$body.user.age}</li>
    </ul>
<h3>ブログ</h3>
    <ul>
        <li>{$body.blog.name}</li>
    </ul>
{* ブログ *}
<div id="blog">
<h3>記事</h3>
<ul>
{foreach item=entry from=$body.entry}
    {* 記事 *}
    <li class="entry">{$entry.title}</li>
    <ul>
            {* コメント *}
            {foreach item=comment from=$entry.comment}
            <li class="comment">{$comment.title}</li>
            <ul>
            {foreach item=thumb from=$comment.thumb}
                {* コメント評価 *}
                <li class="thumb">{$thumb.title}</li>
            {/foreach}
            </ul>
            {/foreach}
        </li>
        {* トラックバック *}
            {foreach item=trackback from=$entry.trackback}
            {* コメント *}
            <li class="trackback">{$trackback.title}</li>
            {/foreach}
        </li>
    </ul>
{/foreach}
</ul>
</div>


