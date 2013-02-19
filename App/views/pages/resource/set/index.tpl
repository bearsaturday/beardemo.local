<h2>リソースセットオプション</h2>
<div class="sort"><a href="?_sort=id">↓古い順</a>&nbsp;<a href="?_sort=-id">↑新しい順</a></div>

<h2>set('arrayEntry', 'value') - リソースbodyをvalueで即セット (リソーステンプレートなし)</h2>
<h3>($arrayEntryは連想配列)</h3>
<ul class="entry">
    {foreach item=item from=$arrayEntry}
    <li>
       <a href="/db/select/item.php?id={$item.id}" class="entry-title">{$item.title}</a><span class="entry-body">{$item.body|mb_strimwidth:0:120:'...'|escape}</span>
    </li>
    {/foreach}
</ul>
<div class="pager">{$pager.links.all}</div>

<h2>set('stringEntry', 'value') - リソースbodyをvalueで即セット (リソーステンプレートあり)</h2>
<h3>($stringEntryは文字列)</h3>
{$stringEntry}
<div class="pager">{$pager.links.all}</div>


<h2>set('objectEntry', 'object') - リソースobjectをeagerでセット(リソーステンプレート付)</h2>
<h3>($stringEntryは文字列)</h3>
{$objectEntry}

<h2>set('lazyEntry', 'lazy') - リソースobjectをlazyでセット(リソーステンプレート付)</h2>
<h3>($stringEntryはリソースオブジェクトが遅延評価された文字列)</h3>
{$lazyEntry}

<h2>set('objectEntry', 'object') - リソースobjectをeagerでセットしgetBody()で取り出す(リソーステンプレートなし)</h2>
<h3>($objectEntryはリソースオブジェクト)</h3>
<ul class="entry">
    {foreach item=item from=$objectEntry->getBody()}
    <li>
       <a href="/db/select/item.php?id={$item.id}" class="entry-title">{$item.title}</a><span class="entry-body">{$item.body|mb_strimwidth:0:120:'...'|escape}</span>
    </li>
    {/foreach}
</ul>
<div class="pager">{$pager.links.all}</div>

<h2>リソースをpull取得</h2>
<h3>{literal}{resource uri="Entry" template="resource/entry" params=$entryParams}{/literal}</h3>
{resource uri="Entry" template="list/entry" params=$entryParams}