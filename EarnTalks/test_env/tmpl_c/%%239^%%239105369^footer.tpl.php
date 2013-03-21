<?php /* Smarty version 2.6.2, created on 2010-04-09 17:49:27
         compiled from footer.tpl */ ?>
</td></tr><tr><td>&nbsp;</td></tr>
</table></td>
            <!-- Main: END -->
<td valign="top" width=180><div class="side">
<?php if ($this->_tpl_vars['frm']['a'] != 'login'): ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "login_box.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endif; ?>
<?php if (showminibanners ( )):  endif; ?>

			<?php if ($this->_tpl_vars['settings']['subscribe_box']): ?>
			<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "subscribe_box.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
			<?php endif; ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "logo_box.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "visitor_statistic.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php if ($this->_tpl_vars['settings']['partners_box']): ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "partners_box.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endif; ?> 
<br><br ></div></td></tr></table></td></tr><tr><td valign="top"><div class="footer"><div align="center">
DISCLAIMER:We do not own or promote any programs listed here.The information provided here is for your own use.Some programs, investments or any listings here may be illegal depending on your country's laws.We do not recommend you spend what you cannot afford to lose.
<br>Website best viewed in 1024 x 768 resolution </div><div align="center">Copyright&copy 2011 by <a href="<?php echo $this->_tpl_vars['settings']['site_url']; ?>
"><?php echo $this->_tpl_vars['settings']['site_name']; ?>
</a> - All right reserved!<br />
Script Powered by <a href="http://EarnTalks.com">EARNTALKS.COM</a><br><br><br><br></div></div></td></tr></table></center></body></html>