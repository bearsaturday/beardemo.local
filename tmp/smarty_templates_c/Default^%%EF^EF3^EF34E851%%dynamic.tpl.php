<?php /* Smarty version 2.6.31, created on 2018-06-04 11:23:38
         compiled from /Users/kooriyama/git/beardemo.local/App/views/pages/test/emoji/dynamic.tpl */ ?>
<h1>動的絵文字</h1>
<ul>
<li><a href="?ua=Docomo">Docomo絵文字</a></a></li>
<li><a href="?ua=Ezweb">Ezweb絵文字</a></a></li>
<li><a href="?ua=Softbank">Softbank絵文字</a></a></li>
</ul>
<div>
<h2><?php echo $this->_tpl_vars['ua']; ?>
</h2>
<ol>
    <?php $_from = $this->_tpl_vars['emoji']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
    <li>
       <span><?php echo $this->_tpl_vars['item']['key']; ?>
;</span>
       <span><?php echo $this->_tpl_vars['item']['value']; ?>
</span>
    </li>
    <?php endforeach; endif; unset($_from); ?>
</ol>
<?php echo $this->_tpl_vars['pager']['links']['all']; ?>

<hr />