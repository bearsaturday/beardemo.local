<?php /* Smarty version 2.6.31, created on 2018-06-04 11:22:51
         compiled from /Users/kooriyama/git/beardemo.local/App/views/layouts/default.mobile.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 'agent', '/Users/kooriyama/git/beardemo.local/App/views/layouts/default.mobile.tpl', 12, false),)), $this); ?>
<?php echo '<?xml'; ?>
 version="1.0" encoding="<?php echo $this->_tpl_vars['charset']; ?>
" <?php echo '?>'; ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="content-Type" content="application/xhtml+xml; charset=<?php echo $this->_tpl_vars['agent']['charset']; ?>
" />
        <title><?php echo $this->_tpl_vars['layout']['title']; ?>
</title>
        <?php echo $this->_tpl_vars['layout']['metas']; ?>

                <?php $this->_tag_stack[] = array('agent', array('in' => 'Ezweb')); $_block_repeat=true;smarty_block_agent($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
        <meta http-equiv="Cache-Control" content="no-cache" />
        <meta http-equiv="Expires" content="-1" />
        <?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_agent($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
        <style type="text/css">
        <![CDATA[
        a:link<?php echo '{'; ?>
color: #<?php echo $this->_tpl_vars['layout']['color']['a']['link']; ?>
<?php echo '}'; ?>

        a:visited<?php echo '{'; ?>
color: #<?php echo $this->_tpl_vars['layout']['color']['a']['visited']; ?>
<?php echo '}'; ?>

        ]]>
        </style>
    </head>
    <body>
        <div style="font-size:x-small">
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "elements/header.mobile.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        <?php echo $this->_tpl_vars['content_for_layout']; ?>

        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "elements/footer.mobile.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        </div>
    </body>
</html>