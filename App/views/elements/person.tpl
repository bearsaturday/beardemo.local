person data:<br />
{foreach item=item from=$person}
<dl>
    <dt>{$item.name|escape}</dt>
    <dt>{$item.age|escape}</dt>
    <dt>{$item.gender|escape}</dt>
</dl>
{/foreach}