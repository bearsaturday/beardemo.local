<ul>
    {foreach item=item from=$body}
    <li>
    {$item|@printa}
    {$item.0.title}
    </li>
    {/foreach}
</ul>
<div style="text-align: center">
    <div>{$pager.info.page_numbers.current} / {$pager.info.page_numbers.total}（{$pager.info.from}件から{$pager.info.to}件を表示中）</div>
    {$pager.links.all}
</div>