<?php /* Smarty version 2.6.31, created on 2018-06-04 11:22:51
         compiled from /Users/kooriyama/git/beardemo.local/App/views/pages/resource/page.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'printa', '/Users/kooriyama/git/beardemo.local/App/views/pages/resource/page.tpl', 5, false),)), $this); ?>
<h1>Pageリソース</h1>
<h2>pageをリソースとして扱う事ができます</h2>
<h3>ページにsetされたリソース(ro)をページリソースとする場合</h3>
<p>options: array('output' => 'resource')</p>
<?php echo smarty_modifier_printa($this->_tpl_vars['page']); ?>

<h3>出力HTML(string)をページリソースとする場合</h3>
<p>options: array('output' => 'html')</p>
<h4>headers</h4>
<?php echo smarty_modifier_printa($this->_tpl_vars['headers']); ?>

<h4>body</h4>
<?php echo smarty_modifier_printa($this->_tpl_vars['body']); ?>

<h3>UAをDocomoにして出力HTML(string)をページリソースとする場合</h3>
<p>options: array('output' => 'html', 'ua' => 'Docomo')</p>
<h4>headers</h4>
<?php echo smarty_modifier_printa($this->_tpl_vars['docomo_headers']); ?>

<h4>body</h4>
<?php echo smarty_modifier_printa($this->_tpl_vars['docomo_body']); ?>
