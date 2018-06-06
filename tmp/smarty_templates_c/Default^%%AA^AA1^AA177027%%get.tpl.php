<?php /* Smarty version 2.6.31, created on 2018-06-04 11:23:26
         compiled from /Users/kooriyama/git/beardemo.local/App/views/pages/test/session/get.tpl */ ?>
取得したセッション情報=[<?php echo $this->_tpl_vars['test']; ?>
]

<?php if (! $this->_tpl_vars['test']): ?><p style="color:red">セッション情報は破棄されています。</p>
<ul>
<li><a href="file.php">ファイルセッションテストへ</a></li>
<li><a href="db.php">DBセッションテストへ</a></li>
</ul>
<?php endif; ?>