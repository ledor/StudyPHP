<?php /* Smarty version 2.6.2, created on 2011-12-30 05:29:18
         compiled from rsidebar.tpl */ ?>
<td valign="top" width=180><div class="side">

<?php if ($this->_tpl_vars['setting']['search_box']):  if ($this->_tpl_vars['setting']['search_box_pos'] == 0):  $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "search_box.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
  endif;  endif; ?>

<?php if ($this->_tpl_vars['settings']['minibanner_box']):  if ($this->_tpl_vars['settings']['minibanner_box_pos'] == 0):  if (showminibanners ( )):  endif;  endif;  endif; ?>

<?php if ($this->_tpl_vars['settings']['login_box']):  if ($this->_tpl_vars['settings']['login_box_pos'] == 0):  if ($this->_tpl_vars['frm']['a'] != 'login'):  $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "login_box.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
  endif;  endif;  endif; ?>

<?php if ($this->_tpl_vars['settings']['textads_box']):  if ($this->_tpl_vars['settings']['textads_box_pos'] == 0):  $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "textads_box.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
  endif;  endif; ?>

<?php if ($this->_tpl_vars['settings']['ecurrency_box']):  if ($this->_tpl_vars['settings']['ecurrency_box_pos'] == 0):  $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "e-currency.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
  endif;  endif; ?>

<?php if ($this->_tpl_vars['settings']['admin_ym_account_box']):  if ($this->_tpl_vars['settings']['admin_ym_account_box_pos'] == 0):  $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "livesupport.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
  endif;  endif; ?>

<?php if ($this->_tpl_vars['settings']['rcb_box']):  if ($this->_tpl_vars['settings']['rcb_box_pos'] == 0):  $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "top10rcb.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
  endif;  endif; ?>

<?php if ($this->_tpl_vars['settings']['top10_box']):  if ($this->_tpl_vars['settings']['top10_box_pos'] == 0):  $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "top10monitored_box.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
  endif;  endif; ?>

<?php if ($this->_tpl_vars['settings']['newlistings_box']):  if ($this->_tpl_vars['settings']['newlistings_box_pos'] == 0):  if ($this->_tpl_vars['frm']['a'] != 'new'):  $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "newlistings_box.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
  endif;  endif;  endif; ?>

<?php if ($this->_tpl_vars['settings']['lastestpayout_box']):  if ($this->_tpl_vars['settings']['lastestpayout_box_pos'] == 0):  $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "lastestpayout_box.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
  endif;  endif; ?>

<?php if ($this->_tpl_vars['settings']['lastestvote_box']):  if ($this->_tpl_vars['settings']['lastestvote_box_pos'] == 0):  $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "lastestvote_box.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
  endif;  endif; ?>

<?php if ($this->_tpl_vars['settings']['paysystems_box']):  if ($this->_tpl_vars['settings']['paysystems_box_pos'] == 0):  $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "paysystems_box.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
  endif;  endif; ?>

<?php if ($this->_tpl_vars['settings']['subscribe_box']):  if ($this->_tpl_vars['settings']['subscribe_box_pos'] == 0):  $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "subscribe_box.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
  endif;  endif; ?>

<?php if ($this->_tpl_vars['settings']['logo_box']):  if ($this->_tpl_vars['settings']['logo_box_pos'] == 0):  $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "logo_box.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
  endif;  endif; ?>

<?php if ($this->_tpl_vars['settings']['visitor_statistic_box']):  if ($this->_tpl_vars['settings']['visitor_statistic_box_pos'] == 0):  $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "visitor_statistic.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
  endif;  endif; ?>

<?php if ($this->_tpl_vars['settings']['partners_box']):  if ($this->_tpl_vars['settings']['partners_box_pos'] == 0):  $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "partners_box.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
  endif;  endif; ?>

</div></td>