<ul class="entry">
    {foreach item=item from=$body}
    <li>
       <a href="/db/select/item.php?id={$item.id}" class="entry-title">{$item.title}</a><span class="entry-body">{$item.body|mb_truncate:120}</span>
    </li>
    {/foreach}
</ul>