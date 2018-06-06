<?php /* Smarty version 2.6.31, created on 2018-06-06 03:24:10
         compiled from /Users/kooriyama/git/beardemo.local/App/views/elements/link/pager.tpl */ ?>

<h3>ユーザー</h3>
    <ul>
        <li class="name"><?php echo $this->_tpl_vars['body']['user']['name']; ?>
</li>
        <li class="age"><?php echo $this->_tpl_vars['body']['user']['age']; ?>
</li>
    </ul>
<h3>ブログ</h3>
    <ul>
        <li class="blog"><?php echo $this->_tpl_vars['body']['blog']['name']; ?>
</li>
    </ul>
<div id="blog">
<h3>記事</h3>
<ul>
<?php $_from = $this->_tpl_vars['body']['db_entry']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['entry']):
?>
        <li class="entry"><span class="title"><?php echo $this->_tpl_vars['entry']['title']; ?>
</span>&nbsp<span class="body"><?php echo $this->_tpl_vars['entry']['body']; ?>
</span></li>
<?php endforeach; endif; unset($_from); ?>
</ul>

</div>
