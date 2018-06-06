<?php /* Smarty version 2.6.31, created on 2018-06-04 12:16:21
         compiled from /Users/kooriyama/git/beardemo.local/App/views/elements/list/entry.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'mb_strimwidth', '/Users/kooriyama/git/beardemo.local/App/views/elements/list/entry.tpl', 4, false),array('modifier', 'escape', '/Users/kooriyama/git/beardemo.local/App/views/elements/list/entry.tpl', 4, false),)), $this); ?>
<ul class="entry">
    <?php $_from = $this->_tpl_vars['body']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
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