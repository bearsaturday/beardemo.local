<h2>Resource Link</h2>

<h3>ユーザー</h3>
    <ul>
        <li>{$user.name}</li>
        <li>{$user.age}</li>
    </ul>
<h3>ブログ</h3>
    <ul>
        <li>{$blog.name}</li>
    </ul>
<h3>記事</h3>
<ul>
{foreach item=ientry from=$entry}
    <li>{$ientry.title}</li>
    <ul>
        {* コメント *}
        <li>
            {foreach item=comment from=$ientry.comment}
            <li>{$comment.title}</li>
            <ul>
            {foreach item=thumb from=$comment.thumb}
                {* コメント評価 *}
                <li>{$thumb.title}</li>
            {/foreach}
            </ul>
            {/foreach}
        </li>
        {* トラックバック *}
        <li>
            {foreach item=trackback from=$ientry.trackback}
            {* コメント *}
            <li>{$trackback.title}</li>
            {/foreach}
        </li>
    </ul>
{/foreach}
</ul>
