<?php /* Smarty version 2.6.31, created on 2018-06-04 11:22:51
         compiled from /Users/kooriyama/git/beardemo.local/App/views/pages/db/select/item.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'nl2br', '/Users/kooriyama/git/beardemo.local/App/views/pages/db/select/item.tpl', 2, false),)), $this); ?>
<h2><?php echo $this->_tpl_vars['entry']['title']; ?>
</h2>
<p><?php echo ((is_array($_tmp=$this->_tpl_vars['entry']['body'])) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
</p>