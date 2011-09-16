<h1>CSVリソース</h1>
<h2>郵便番号</h2>
<ul>
    {foreach item=item from=$post}
    <li>
      〒{$item.0}-{$item.1}　{$item.6}{$item.7}{$item.8}
    </li>
    {/foreach}
</ul>
<div style="text-align: center">
    <div>{$pager.info.page_numbers.current} / {$pager.info.page_numbers.total}（{$pager.info.from}件から{$pager.info.to}件を表示中）</div>
    {$pager.links.all}
</div>