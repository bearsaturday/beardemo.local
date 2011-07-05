<h2>リソースセットオプション</h2>
<div class="sort"><a href="?_sort=id">↓古い順</a>&nbsp;<a href="?_sort=-id">↑新しい順</a></div>
{* --------------------------------------*}
<h2>set('entry1', 'body') - リソースbodyをeagerでセット </h2>
<h3>($entry1は連想配列)</h3>
<ul class="entry">
    {foreach item=item from=$entry1}
    <li>
       <a href="/db/select/item.php?id={$item.id}" class="entry-title">{$item.title}</a><span class="entry-body">{$item.body|mb_truncate:120}</span>
    </li>
    {/foreach}
</ul>
<div class="pager">{$pager.links.all}</div>
{* --------------------------------------*}
<h2>set('entry2', 'object') - リソースobjectをeagerでセット(リソーステンプレート付)</h2>
<h3>($entry2はbodyがリソーステンプレートにアサインされた文字列)</h3>
{$entry2}
{* --------------------------------------*}
<h2>set('entry3', 'object') - リソースobjectをeagerでセット(リソーステンプレートなし)</h2>
<h3>($entry3はリソースオブジェクト ArrayObjectなので配列として使用)</h3>
<ul class="entry">
    {foreach item=item from=$entry1}
    <li>
       <a href="/db/select/item.php?id={$item.id}" class="entry-title">{$item.title}</a><span class="entry-body">{$item.body|mb_truncate:120}</span>
    </li>
    {/foreach}
</ul>
{* --------------------------------------*}
<h2>set('entry4', 'lazy') - リソースobjectをlazyでセット(リソーステンプレート付)</h2>
<h3>($entry3はbodyがリソーステンプレートにアサインされた文字列)</h3>
{$entry4}
{* --------------------------------------*}
<h2>set('entry5', 'lazy') - リソースobjectをlazyでセット(リソーステンプレートなし)</h2>
<h3>($entry5はリソースオブジェクト)</h3>
<ul class="entry">
    {foreach item=item from=$entry5->getBody()}
    <li>
       <a href="/db/select/item.php?id={$item.id}" class="entry-title">{$item.title}</a><span class="entry-body">{$item.body|mb_truncate:120}</span>
    </li>
    {/foreach}
</ul>
<div class="pager">{$pager.links.all}</div>
{* --------------------------------------*}
<h2>リソースをpull取得</h2>
<h3>{literal}{resource uri="Entry" template="resource/entry" params=$entryParams}{/literal}</h3>
{resource uri="Entry" template="list/entry" params=$entryParams}

{*
<h2>set('entry6', 'ajax') - リソースobjectをajaxでセット(リソーステンプレート付)</h2>
<h3>($entry6はbodyがリソーステンプレートにアサインされた文字列)</h3>
{$entry6}
*}