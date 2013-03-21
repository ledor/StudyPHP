<?php /* Smarty version 2.6.2, created on 2011-12-18 09:35:32
         compiled from allrcb.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<table cellspacing=0 cellpadding=0 border=0 width=100% class="listbody">  
<tr>
<th>
<font color=red>ALL RCB PROGRAMS</font>
</th>
</tr>
</table>

<?php if (isset($this->_sections['n'])) unset($this->_sections['n']);
$this->_sections['n']['name'] = 'n';
$this->_sections['n']['loop'] = is_array($_loop=$this->_tpl_vars['n_info']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['n']['show'] = true;
$this->_sections['n']['max'] = $this->_sections['n']['loop'];
$this->_sections['n']['step'] = 1;
$this->_sections['n']['start'] = $this->_sections['n']['step'] > 0 ? 0 : $this->_sections['n']['loop']-1;
if ($this->_sections['n']['show']) {
    $this->_sections['n']['total'] = $this->_sections['n']['loop'];
    if ($this->_sections['n']['total'] == 0)
        $this->_sections['n']['show'] = false;
} else
    $this->_sections['n']['total'] = 0;
if ($this->_sections['n']['show']):

            for ($this->_sections['n']['index'] = $this->_sections['n']['start'], $this->_sections['n']['iteration'] = 1;
                 $this->_sections['n']['iteration'] <= $this->_sections['n']['total'];
                 $this->_sections['n']['index'] += $this->_sections['n']['step'], $this->_sections['n']['iteration']++):
$this->_sections['n']['rownum'] = $this->_sections['n']['iteration'];
$this->_sections['n']['index_prev'] = $this->_sections['n']['index'] - $this->_sections['n']['step'];
$this->_sections['n']['index_next'] = $this->_sections['n']['index'] + $this->_sections['n']['step'];
$this->_sections['n']['first']      = ($this->_sections['n']['iteration'] == 1);
$this->_sections['n']['last']       = ($this->_sections['n']['iteration'] == $this->_sections['n']['total']);
?>

<table cellspacing=0 cellpadding=0 border=0 width=100% class="listbody">  
<tr bgcolor="#dfdfdf">

<td width=60% align="left">
<font color=red><?php echo $this->_tpl_vars['n_info'][$this->_sections['n']['index']]['name']; ?>
</font>
</td>
<td width=20% align="right">
<a href="?a=go&lid=<?php echo $this->_tpl_vars['n_info'][$this->_sections['n']['index']]['id']; ?>
"  target="_blank"><font color=blue>Join It</font></a>
</td>
<td width=20% align="right">
<a href="?a=rcb&lid=<?php echo $this->_tpl_vars['n_info'][$this->_sections['n']['index']]['id']; ?>
"><font color=blue>Request RCB</font></a>
</td>

</tr>






<table cellspacing=0 cellpadding=0 border=1 width=100% class="listbody" style="border-color: #F7FFE0">
<tr bgcolor="#eeeeee">
<td width=25% align="center" rowspan="2" bordercolor="#000000">Deposit</td>
<td width=15% align="center" rowspan="2" bordercolor="#000000">REF</td>
<td width="30%" align="center" colspan="2" bordercolor="#000000">
1st Deposit</td>
<td width="30%" align="center" colspan="2" bordercolor="#000000">
Re-Invested</td>

</tr>


<tr bgcolor="#eeeeee">
<td width=15% align="center" bordercolor="#000000">
RCB</td>
<td width=15% align="center" bordercolor="#000000">
BONUS</td>
<td width=15% align="center" bordercolor="#000000">
RCB</td>
<td width=15% align="center" bordercolor="#000000">
BONUS</td>

</tr>

<?php if (isset($this->_sections['l'])) unset($this->_sections['l']);
$this->_sections['l']['name'] = 'l';
$this->_sections['l']['loop'] = is_array($_loop=$this->_tpl_vars['r_info']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['l']['show'] = true;
$this->_sections['l']['max'] = $this->_sections['l']['loop'];
$this->_sections['l']['step'] = 1;
$this->_sections['l']['start'] = $this->_sections['l']['step'] > 0 ? 0 : $this->_sections['l']['loop']-1;
if ($this->_sections['l']['show']) {
    $this->_sections['l']['total'] = $this->_sections['l']['loop'];
    if ($this->_sections['l']['total'] == 0)
        $this->_sections['l']['show'] = false;
} else
    $this->_sections['l']['total'] = 0;
if ($this->_sections['l']['show']):

            for ($this->_sections['l']['index'] = $this->_sections['l']['start'], $this->_sections['l']['iteration'] = 1;
                 $this->_sections['l']['iteration'] <= $this->_sections['l']['total'];
                 $this->_sections['l']['index'] += $this->_sections['l']['step'], $this->_sections['l']['iteration']++):
$this->_sections['l']['rownum'] = $this->_sections['l']['iteration'];
$this->_sections['l']['index_prev'] = $this->_sections['l']['index'] - $this->_sections['l']['step'];
$this->_sections['l']['index_next'] = $this->_sections['l']['index'] + $this->_sections['l']['step'];
$this->_sections['l']['first']      = ($this->_sections['l']['iteration'] == 1);
$this->_sections['l']['last']       = ($this->_sections['l']['iteration'] == $this->_sections['l']['total']);
?>


<?php if ($this->_tpl_vars['r_info'][$this->_sections['l']['index']]['type'] == 'LD'):  if ($this->_tpl_vars['r_info'][$this->_sections['l']['index']]['depositfrom'] > 0):  if ($this->_tpl_vars['r_info'][$this->_sections['l']['index']]['program_id'] == $this->_tpl_vars['n_info'][$this->_sections['n']['index']]['id']): ?>
<tr bgcolor="#FFFFFF">
<td  align="center">$<?php echo $this->_tpl_vars['r_info'][$this->_sections['l']['index']]['depositfrom']; ?>
-$<?php echo $this->_tpl_vars['r_info'][$this->_sections['l']['index']]['depositto']; ?>
</td>
<td  align="center"><?php if ($this->_tpl_vars['r_info'][$this->_sections['l']['index']]['rcb'] > 0): ?> <?php echo $this->_tpl_vars['r_info'][$this->_sections['l']['index']]['ref']; ?>
% <?php else: ?> --- <?php endif; ?></td>
<td  align="center"><?php if ($this->_tpl_vars['r_info'][$this->_sections['l']['index']]['rcb'] > 0): ?> <?php echo $this->_tpl_vars['r_info'][$this->_sections['l']['index']]['rcb']; ?>
% <?php else: ?> --- <?php endif; ?></td>
<td  align="center"><?php if ($this->_tpl_vars['r_info'][$this->_sections['l']['index']]['bonus'] > 0): ?> $<?php echo $this->_tpl_vars['r_info'][$this->_sections['l']['index']]['bonus']; ?>
 <?php else: ?> --- <?php endif; ?></td>
<td  align="center"><?php if ($this->_tpl_vars['r_info'][$this->_sections['l']['index']]['rcb2'] > 0): ?> <?php echo $this->_tpl_vars['r_info'][$this->_sections['l']['index']]['rcb2']; ?>
% <?php else: ?> --- <?php endif; ?></td>
<td  align="center"><?php if ($this->_tpl_vars['r_info'][$this->_sections['l']['index']]['bonus2'] > 0): ?> $<?php echo $this->_tpl_vars['r_info'][$this->_sections['l']['index']]['bonus2']; ?>
 <?php else: ?> --- <?php endif; ?></td>

</tr>

<?php endif;  endif;  endif; ?>

<?php endfor; endif; ?>

</table>
<br>
<?php endfor; endif; ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>