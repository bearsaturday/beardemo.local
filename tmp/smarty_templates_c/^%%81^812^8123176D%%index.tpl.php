<?php /* Smarty version 2.6.31, created on 2018-06-04 11:33:17
         compiled from /Users/kooriyama/git/beardemo.local/App/views/pages/form/smartyvalidate/index.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'validate', '/Users/kooriyama/git/beardemo.local/App/views/pages/form/smartyvalidate/index.tpl', 3, false),array('modifier', 'escape', '/Users/kooriyama/git/beardemo.local/App/views/pages/form/smartyvalidate/index.tpl', 10, false),)), $this); ?>
<form method="post" action="smartyvalidate.php">
    <div style='color:red'>
    <?php echo smarty_function_validate(array('id' => 'fullname','message' => "Full Name Cannot Be Empty<br /> "), $this);?>

    <?php echo smarty_function_validate(array('id' => 'phone','message' => "Phone Number Must be a Number<br /> "), $this);?>

    <?php echo smarty_function_validate(array('id' => 'expdate','message' => "Exp Date not valid<br />"), $this);?>

    <?php echo smarty_function_validate(array('id' => 'email','message' => "Email not valid<br />"), $this);?>

    <?php echo smarty_function_validate(array('id' => 'date','message' => "Date not valid<br />"), $this);?>

    <?php echo smarty_function_validate(array('id' => 'password','message' => "passwords do not match<br />"), $this);?>

    </div>
    Full Name: <input type="text" name="FullName" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['FullName'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"><br />
    Phone :<input type="text" name="Phone" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['Phone'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" empty="yes"><br />
    Exp Date: <input type="text" name="CCExpDate" size="8" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['CCExpDate'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"><br />
    Email: <input type="text" name="Email" size="30" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['Email'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"><br />
    Date: <input type="text" name="Date" size="10" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['Date'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"><br />
    password: <input type="password" name="password" size="10" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['password'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"><br />
    password2: <input type="password" name="password2" size="10" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['password2'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"><br />
    <input type="submit">
</form>