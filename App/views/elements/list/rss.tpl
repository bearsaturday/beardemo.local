<ul>
    {foreach item=item from=$body}
    <li>
       <a href="{$item.link}">{$item.title}</a><br />
       {$item.description}
    </li>
    {/foreach}
</ul>
