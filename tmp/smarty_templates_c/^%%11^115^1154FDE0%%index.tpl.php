<?php /* Smarty version 2.6.31, created on 2018-06-04 11:22:48
         compiled from /Users/kooriyama/git/beardemo.local/App/views/pages/resource/set/index.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'mb_strimwidth', '/Users/kooriyama/git/beardemo.local/App/views/pages/resource/set/index.tpl', 9, false),array('modifier', 'escape', '/Users/kooriyama/git/beardemo.local/App/views/pages/resource/set/index.tpl', 9, false),array('function', 'resource', '/Users/kooriyama/git/beardemo.local/App/views/pages/resource/set/index.tpl', 42, false),)), $this); ?>
<h2>リソースセットオプション</h2>
<div class="sort"><a href="?_sort=id">↓古い順</a>&nbsp;<a href="?_sort=-id">↑新しい順</a></div>

<h2>set('arrayEntry', 'value') - リソースbodyをvalueで即セット (リソーステンプレートなし)</h2>
<h3>($arrayEntryは連想配列)</h3>
<ul class="entry">
    <?php $_from = $this->_tpl_vars['arrayEntry']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
    <li>
       <a href="/db/select/item.php?id=<?php echo $this->_tpl_vars['item']['id']; ?>
" class="entry-title"><?php echo $this->_tpl_vars['item']['title']; ?>
</a><span class="entry-body"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['item']['body'])) ? $this->_run_mod_handler('mb_strimwidth', true, $_tmp, 0, 120, '...') : mb_strimwidth($_tmp, 0, 120, '...')))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</span>
    </li>
    <?php endforeach; endif; unset($_from); ?>
</ul>
<div class="pager"><?php echo $this->_tpl_vars['pager']['links']['all']; ?>
</div>

<h2>set('stringEntry', 'value') - リソースbodyをvalueで即セット (リソーステンプレートあり)</h2>
<h3>($stringEntryは文字列)</h3>
<?php echo $this->_tpl_vars['stringEntry']; ?>

<div class="pager"><?php echo $this->_tpl_vars['pager']['links']['all']; ?>
</div>


<h2>set('objectEntry', 'object') - リソースobjectをeagerでセット(リソーステンプレート付)</h2>
<h3>($stringEntryは文字列)</h3>
<?php echo $this->_tpl_vars['objectEntry']; ?>


<h2>set('lazyEntry', 'lazy') - リソースobjectをlazyでセット(リソーステンプレート付)</h2>
<h3>($stringEntryはリソースオブジェクトが遅延評価された文字列)</h3>
<?php echo $this->_tpl_vars['lazyEntry']; ?>


<h2>set('objectEntry', 'object') - リソースobjectをeagerでセットしgetBody()で取り出す(リソーステンプレートなし)</h2>
<h3>($objectEntryはリソースオブジェクト)</h3>
<ul class="entry">
    <?php $_from = $this->_tpl_vars['objectEntry']->getBody(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
    <li>
       <a href="/db/select/item.php?id=<?php echo $this->_tpl_vars['item']['id']; ?>
" class="entry-title"><?php echo $this->_tpl_vars['item']['title']; ?>
</a><span class="entry-body"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['item']['body'])) ? $this->_run_mod_handler('mb_strimwidth', true, $_tmp, 0, 120, '...') : mb_strimwidth($_tmp, 0, 120, '...')))) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</span>
    </li>
    <?php endforeach; endif; unset($_from); ?>
</ul>
<div class="pager"><?php echo $this->_tpl_vars['pager']['links']['all']; ?>
</div>

<h2>リソースをpull取得</h2>
<h3><?php echo '{resource uri="Entry" template="resource/entry" params=$entryParams}'; ?>
</h3>
<?php echo smarty_function_resource(array('uri' => 'Entry','template' => "list/entry",'params' => $this->_tpl_vars['entryParams']), $this);?>