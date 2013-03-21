<?php /* Smarty version 2.6.2, created on 2011-12-18 03:20:25
         compiled from home.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php echo '
<script language=javascript><!--
function viewStatistics(id)
{
  w = 400; h = 600;
  t = (screen.height-h-30)/2;
  l = (screen.width-w-30)/2;
  window.open(\'?a=view_statistics&lid=\' + id, \'view_statistics\' + id, "top="+t+",left="+l+",width="+w+",height="+h+",resizable=1,scrollbars=1");
}
--></script>
'; ?>


<?php if (isset($this->_sections['g'])) unset($this->_sections['g']);
$this->_sections['g']['name'] = 'g';
$this->_sections['g']['loop'] = is_array($_loop=$this->_tpl_vars['groups']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['g']['show'] = true;
$this->_sections['g']['max'] = $this->_sections['g']['loop'];
$this->_sections['g']['step'] = 1;
$this->_sections['g']['start'] = $this->_sections['g']['step'] > 0 ? 0 : $this->_sections['g']['loop']-1;
if ($this->_sections['g']['show']) {
    $this->_sections['g']['total'] = $this->_sections['g']['loop'];
    if ($this->_sections['g']['total'] == 0)
        $this->_sections['g']['show'] = false;
} else
    $this->_sections['g']['total'] = 0;
if ($this->_sections['g']['show']):

            for ($this->_sections['g']['index'] = $this->_sections['g']['start'], $this->_sections['g']['iteration'] = 1;
                 $this->_sections['g']['iteration'] <= $this->_sections['g']['total'];
                 $this->_sections['g']['index'] += $this->_sections['g']['step'], $this->_sections['g']['iteration']++):
$this->_sections['g']['rownum'] = $this->_sections['g']['iteration'];
$this->_sections['g']['index_prev'] = $this->_sections['g']['index'] - $this->_sections['g']['step'];
$this->_sections['g']['index_next'] = $this->_sections['g']['index'] + $this->_sections['g']['step'];
$this->_sections['g']['first']      = ($this->_sections['g']['iteration'] == 1);
$this->_sections['g']['last']       = ($this->_sections['g']['iteration'] == $this->_sections['g']['total']);
 if (! $this->_tpl_vars['groups'][$this->_sections['g']['index']]['listings']): ?>
<table width=100% border=0 cellspacing=0 cellpadding=0>
<tr><td valign="middle">
<div class="maintitle2" align="left"><img src="images/t_nl.png" width=11 height=24 align="left">
<div class="maintitle_text" align="left"><?php echo $this->_tpl_vars['groups'][$this->_sections['g']['index']]['name']; ?>
 Listing</div></div>
</td></tr>
<tr><td class="main_line"><img src="images/spacer.gif" height=3></td></tr>
<tr>
<td align=center>
<br>Currently there are no items in the <?php echo $this->_tpl_vars['groups'][$this->_sections['g']['index']]['name']; ?>
 listing <?php if ($this->_tpl_vars['frm']['pfilter']): ?>using <?php echo $this->_tpl_vars['frm']['pfilter'];  endif; ?><br><br>
<?php if ($this->_tpl_vars['groups'][$this->_sections['g']['index']]['reg_enabled']): ?>
<a href="?a=advertise#<?php echo $this->_tpl_vars['groups'][$this->_sections['g']['index']]['type']; ?>
">List your program in the <?php echo $this->_tpl_vars['groups'][$this->_sections['g']['index']]['name']; ?>
 listing</a><br><br>
    <?php endif; ?>
</td></tr>
<tr><td>&nbsp;</td></tr></table>

<?php else:  if ($this->_tpl_vars['groups'][$this->_sections['g']['index']]['type'] == 'Premium'):  $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "list_premium.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
  endif;  if ($this->_tpl_vars['groups'][$this->_sections['g']['index']]['type'] == 'Normal'):  $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "list_normal.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
  endif;  if ($this->_tpl_vars['groups'][$this->_sections['g']['index']]['type'] == 'Trial'):  $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "list_trial.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
  endif;  if ($this->_tpl_vars['groups'][$this->_sections['g']['index']]['type'] == 'Autosurf'):  $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "list_autosurf.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
  endif;  if ($this->_tpl_vars['groups'][$this->_sections['g']['index']]['type'] == 'Free'):  $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "list_free.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
  endif;  if ($this->_tpl_vars['groups'][$this->_sections['g']['index']]['type'] == 'Games'):  $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "list_games.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
  endif;  if ($this->_tpl_vars['groups'][$this->_sections['g']['index']]['type'] == 'Scam'):  $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "list_scam.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
  endif;  if ($this->_tpl_vars['groups'][$this->_sections['g']['index']]['type'] == 'Closed'):  $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "list_closed.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
  endif;  endif; ?>
<div align="center">
<?php if (showrotatingbanners ( )):  endif; ?>
<br><br>
</div>
<?php endfor; endif; ?>


<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>