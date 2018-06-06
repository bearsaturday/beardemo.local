<?php /* Smarty version 2.6.31, created on 2018-06-04 11:22:44
         compiled from /Users/kooriyama/git/beardemo.local/App/views/pages/resource/link/list/template.tpl */ ?>
<h2>Resource Link Template</h2>
<?php echo $this->_tpl_vars['blog']; ?>


<?php if ($this->_tpl_vars['blog']->getCode() == 200): ?>

    <p>[<?php echo $this->_tpl_vars['blog']['user']['name']; ?>
]のユーザーリソースは問題なく取得できました</p>
<?php endif; ?>