<ul class="entry">
    {foreach item=item from=$body}
    <li>
       <a href="/db/select/item.php?id={$item.id}" class="entry-title">{$item.title}</a><span class="entry-body">{$item.body|mb_strimwidth:0:120:'...'|escape}</span>
    </li>
    {/foreach}
</ul>