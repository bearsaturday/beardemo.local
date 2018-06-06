<?php /* Smarty version 2.6.31, created on 2018-06-06 03:38:14
         compiled from /Users/kooriyama/git/beardemo.local/App/views/elements/user.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', '/Users/kooriyama/git/beardemo.local/App/views/elements/user.tpl', 8, false),)), $this); ?>
<div id="user_resource">
    <h3>ユーザー</h3>
    <ul>
        <li><?php echo $this->_tpl_vars['body']['name']; ?>
</li>
        <li><?php echo $this->_tpl_vars['body']['age']; ?>
</li>
        <li>ID=<?php echo $this->_tpl_vars['body']['id']; ?>
</li>
    </ul>
    <div id="time">現在時刻: <?php echo ((is_array($_tmp=time())) ? $this->_run_mod_handler('date_format', true, $_tmp, '%Y/%m/%d %H:%M:%S') : smarty_modifier_date_format($_tmp, '%Y/%m/%d %H:%M:%S')); ?>
</div>
</div>