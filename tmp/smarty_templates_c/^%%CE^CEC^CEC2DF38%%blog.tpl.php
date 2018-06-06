<?php /* Smarty version 2.6.31, created on 2018-06-04 11:22:44
         compiled from /Users/kooriyama/git/beardemo.local/App/views/elements/link/blog.tpl */ ?>

<h3>ユーザー</h3>
    <ul>
        <li><?php echo $this->_tpl_vars['body']['user']['name']; ?>
</li>
        <li><?php echo $this->_tpl_vars['body']['user']['age']; ?>
</li>
    </ul>
<h3>ブログ</h3>
    <ul>
        <li><?php echo $this->_tpl_vars['body']['blog']['name']; ?>
</li>
    </ul>
<div id="blog">
<h3>記事</h3>
<ul>
<?php $_from = $this->_tpl_vars['body']['entry']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['entry']):
?>
        <li class="entry"><?php echo $this->_tpl_vars['entry']['title']; ?>
</li>
    <ul>
                        <?php $_from = $this->_tpl_vars['entry']['comment']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['comment']):
?>
            <li class="comment"><?php echo $this->_tpl_vars['comment']['title']; ?>
</li>
            <ul>
            <?php $_from = $this->_tpl_vars['comment']['thumb']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['thumb']):
?>
                                <li class="thumb"><?php echo $this->_tpl_vars['thumb']['title']; ?>
</li>
            <?php endforeach; endif; unset($_from); ?>
            </ul>
            <?php endforeach; endif; unset($_from); ?>
        </li>
                    <?php $_from = $this->_tpl_vars['entry']['trackback']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['trackback']):
?>
                        <li class="trackback"><?php echo $this->_tpl_vars['trackback']['title']; ?>
</li>
            <?php endforeach; endif; unset($_from); ?>
        </li>
    </ul>
<?php endforeach; endif; unset($_from); ?>
</ul>
</div>

