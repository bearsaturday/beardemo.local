<?php /* Smarty version 2.6.31, created on 2018-06-04 11:22:58
         compiled from /Users/kooriyama/git/beardemo.local/App/views/elements/list/rss.tpl */ ?>
<ul>
    <?php $_from = $this->_tpl_vars['body']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
    <li>
       <a href="<?php echo $this->_tpl_vars['item']['link']; ?>
"><?php echo $this->_tpl_vars['item']['title']; ?>
</a><br />
       <?php echo $this->_tpl_vars['item']['description']; ?>

    </li>
    <?php endforeach; endif; unset($_from); ?>
</ul>