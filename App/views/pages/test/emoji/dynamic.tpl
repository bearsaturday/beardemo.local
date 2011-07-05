<h1>動的絵文字</h1>
<ul>
<li><a href="?ua=Docomo">Docomo絵文字</a></a></li>
<li><a href="?ua=Ezweb">Ezweb絵文字</a></a></li>
<li><a href="?ua=Softbank">Softbank絵文字</a></a></li>
</ul>
<div>
<h2>{$ua}</h2>
<ol>
    {foreach item=item from=$emoji}
    <li>
       <span>{$item.key};</span>
       <span>{$item.value}</span>
    </li>
    {/foreach}
</ol>
{$pager.links.all}
<hr />