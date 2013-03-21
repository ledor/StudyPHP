<?php /* Smarty version 2.6.2, created on 2011-12-30 07:58:18
         compiled from vote_accepted.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<table width=100% border=0 cellspacing=0 cellpadding=0><tr><td valign="middle"><div class="maintitle1" align="left"><img src="images/t_pl.png" width=11 height=24 align="left" /><div class="maintitle_text" align="left"><div align="left">Your voting for <?php echo $this->_tpl_vars['listing']['name']; ?>
</div></div></div></td></tr><tr><td class="main_line"><img src="images/spacer.gif" height=3 /></td></tr>
<tr><td><div class="list_side"><table width=100% border=0 cellspacing=0 cellpadding=0><tr><td valign="top"><div class="list_info">

<table cellspacing=1 cellpadding=2 border=0 width=100%>
<tr>
 <td align=center>
 Thank you for voting for <b><?php echo $this->_tpl_vars['listing']['name']; ?>
</b><br>
<?php if ($this->_tpl_vars['frm']['success'] == 1): ?>
Your vote has been successfully added.
<?php endif;  if ($this->_tpl_vars['frm']['success'] == 2): ?>
Your vote has been successfully updated.
<?php endif; ?>
 <br><br>
<a href="?a=details&lid=<?php echo $this->_tpl_vars['frm']['lid']; ?>
">Return to the listing details</a>
 </td>
</tr>
</table>
</div></td></tr></table>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>