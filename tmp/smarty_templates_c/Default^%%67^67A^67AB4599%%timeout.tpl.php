<?php /* Smarty version 2.6.31, created on 2018-06-04 11:23:11
         compiled from /Users/kooriyama/git/beardemo.local/App/views/pages/session/timeout.tpl */ ?>
<h2>セッションタイムアウト</h2>
<p>申し訳ございません. 無操作時間[<?php echo $this->_tpl_vars['idle']; ?>
秒]が続いたのでセッションタイムアウトになりました。</p>

<ul>
    <li><a href="?extend">セッション延長</a></li>
    <li><a href="?logout">ログアウト（別セッションスタート）</a></li>
</ul>