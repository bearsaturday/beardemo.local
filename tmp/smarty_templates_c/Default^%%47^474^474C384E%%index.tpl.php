<?php /* Smarty version 2.6.31, created on 2018-06-04 11:23:05
         compiled from /Users/kooriyama/git/beardemo.local/App/views/pages/ajax/link/index.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 'a', '/Users/kooriyama/git/beardemo.local/App/views/pages/ajax/link/index.tpl', 28, false),)), $this); ?>
<?php echo '
<style type="text/css">
body {
    margin: 20px auto;
    padding: 0;
    width: 580px;
    font: 80%/120% Arial, Helvetica, sans-serif;
}
</style>
'; ?>

<div class="loading" id="loading">Loading...</div>
<h2>Click <a href="ajax/html.php" rel="ajax">Run - HTML</a></h2>
<p>htmlコマンドで文字を挿入します</p>
<h4>msg</h4>
[<span id='msg'>data comes here...</span>]
<h4>time</h4>
[<span id='time'>data comes here...</span>]<br />


<h2>Click <a href="ajax/resource.php" rel="ajax">Run - Resource</a><br /></h2>

<p>リソースを挿入します</p>

Person 1 Data:<br />
[<span id='person1'>data comes here...</span>]<br />


<h2>Click <?php $this->_tag_stack[] = array('a', array('href' => "ajax.php",'click' => 'val','rel' => 'ajax')); $_block_repeat=true;smarty_block_a($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Run Ajax - Value<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_a($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></h2>
<p>Valueコマンドでフォームに値を挿入できます</p>
<form action="/bearjs/json.php" id="form_1" name="form1" >
<fieldset>
<legend>form1</legend>
名前：<input type="text" name="name" id="name" size="40"><br>
性別：<input type="radio" name="gender" id="gender" value="male">男
<input type="radio" name="gender" id="gender" value="female">女<br>
血液型：<select name="blood" id="blood">
<option value="A">A型</option>
<option value="B">B型</option>
<option value="O">O型</option>
<option value="AB">AB型</option>
</select><br>
コメント：<br>
<textarea id="comment" rows="2" cols="50"></textarea><br>
<input type="reset" value="リセット">
</fieldset>
</form>
<h2>Click <?php $this->_tag_stack[] = array('a', array('href' => "ajax.php",'click' => 'read','rel' => 'ajax')); $_block_repeat=true;smarty_block_a($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Run Ajax - 値を読む<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_a($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></h2>
<p>複数のフォームが読み込めます。</p>
<form action="/bearjs/json.php" id="form_2" name="form2" >
<fieldset>
<legend>form2</legend>
名前2<input type="text" name="name" id="name" size="40" value="熊吉"><br>
性別：<input type="radio" name="gender" id="gender" value="male">男
<input type="radio" name="gender" id="gender" value="female">女<br>
</fieldset>
</form>
<br /><br /><br />
<div id="args"></div>
<br />
<h2>Click <?php $this->_tag_stack[] = array('a', array('href' => "ajax.php",'click' => 'js','rel' => 'ajax')); $_block_repeat=true;smarty_block_a($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Run Ajax - JSをコール<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_a($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></h2>
<p><img src="http://www2.bear-project.net/image/BEAR_logo.gif" id="bearlogo">

<h2>Aタグ以外でajax</h2>
<p>画像がAjaxリンクになっています</p>
<img src="/image/rabit.jpg" id="rabbit"><span id="img_msg">左の画像をクリックしてください</span>
<h2>ローダーの場所を変更</h2>
<p>リンクの右にローダーのspanがあります</p>
<a href="ajax/html.php" rel="ajax[another_loader]">Run 別ローダー<span id="another_loader" style="padding:5px;display:none;">Wait...</span>
