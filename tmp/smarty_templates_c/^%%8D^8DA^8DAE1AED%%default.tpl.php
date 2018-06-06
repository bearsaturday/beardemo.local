<?php /* Smarty version 2.6.31, created on 2018-06-06 03:38:14
         compiled from /Users/kooriyama/git/beardemo.local/App/views/layouts/default.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'default', '/Users/kooriyama/git/beardemo.local/App/views/layouts/default.tpl', 24, false),)), $this); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja" id="<?php echo 'beardemo'; ?>">
<head>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<meta http-equiv="Content-language" content="ja" />
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<title><?php echo $this->_tpl_vars['layout']['title']; ?>
</title>
<link rel="apple-touch-icon" href="/apple-touch-icon.png" />
<link rel="shortcut icon" href="/favicon.ico?<?php echo '0.0.2'; ?>" />
<?php echo $this->_tpl_vars['layout']['metas']; ?>

<link rel="stylesheet" href="/css/default.css?<?php echo '0.0.2'; ?>" type="text/css" media="screen" />
<link rel="stylesheet" href="/css/app.css?<?php echo '0.0.2'; ?>" type="text/css" media="screen" />
<link rel="stylesheet" href="/css/form.css?<?php echo '0.0.2'; ?>" type="text/css" media="screen" />
 <?php if ($this->_tpl_vars['layout']['js']['enable']): ?>
<script type="text/javascript" src="/bear/jquery.bear.min.js?<?php echo '0.0.2'; ?>"></script>
<?php if ($this->_tpl_vars['layout']['js']['extra']): ?><?php echo $this->_tpl_vars['layout']['js']['extra']; ?>
<?php endif; ?>
<script type="text/javascript" src="/js/app.js?<?php echo '0.0.2'; ?>"></script>
<script type="text/javascript" src="<?php echo ((is_array($_tmp=@$this->_tpl_vars['layout']['js']['page'])) ? $this->_run_mod_handler('default', true, $_tmp, 'default.js') : smarty_modifier_default($_tmp, 'default.js')); ?>
"></script>
<?php endif; ?> 
<?php echo ((is_array($_tmp=@$this->_tpl_vars['pager']['links']['linktags'])) ? $this->_run_mod_handler('default', true, $_tmp, "") : smarty_modifier_default($_tmp, "")); ?>

</head>
<body>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "elements/header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div class="content"><?php echo $this->_tpl_vars['content_for_layout']; ?>
</div>
<br style="clear:both" /><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "elements/footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</body>
</html>