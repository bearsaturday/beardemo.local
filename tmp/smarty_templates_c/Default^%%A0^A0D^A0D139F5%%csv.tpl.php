<?php /* Smarty version 2.6.31, created on 2018-06-04 11:22:54
         compiled from /Users/kooriyama/git/beardemo.local/App/views/pages/resource/csv.tpl */ ?>
<h1>CSVリソース</h1>
<h2>郵便番号</h2>
<ul>
    <?php $_from = $this->_tpl_vars['post']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
    <li>
      〒<?php echo $this->_tpl_vars['item']['0']; ?>
-<?php echo $this->_tpl_vars['item']['1']; ?>
　<?php echo $this->_tpl_vars['item']['6']; ?>
<?php echo $this->_tpl_vars['item']['7']; ?>
<?php echo $this->_tpl_vars['item']['8']; ?>

    </li>
    <?php endforeach; endif; unset($_from); ?>
</ul>
<div style="text-align: center">
    <div><?php echo $this->_tpl_vars['pager']['info']['page_numbers']['current']; ?>
 / <?php echo $this->_tpl_vars['pager']['info']['page_numbers']['total']; ?>
（<?php echo $this->_tpl_vars['pager']['info']['from']; ?>
件から<?php echo $this->_tpl_vars['pager']['info']['to']; ?>
件を表示中）</div>
    <?php echo $this->_tpl_vars['pager']['links']['all']; ?>

</div>