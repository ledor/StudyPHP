<?php /* Smarty version 2.6.2, created on 2010-04-09 17:53:12
         compiled from allrcbrequest.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<table cellspacing=0 cellpadding=0 border=0 width=100% class="listbody">  
<tr>
<td>
<font color=red>ALL RCB REQUEST</font>
</td>
<td>
Total : <font color=red>$<?php echo $this->_tpl_vars['rcbpaid']; ?>
 </font>Paid
</td>
<td>
Total : <font color=red>$<?php echo $this->_tpl_vars['rcbwaiting']; ?>
 </font>Waiting
</td></tr>
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

<td width=100% align="left">
<font color=red><?php echo $this->_tpl_vars['n_info'][$this->_sections['n']['index']]['rcb_date']; ?>
</font>
</td>
</tr>
</table>

<table cellspacing=0 cellpadding=0 border=1 width=100% class="listbody" style="border-color: #F7FFE0">
<tr bgcolor="#eeeeee">
<td width=10% align="center" bordercolor="#000000">Time</td>
<td width=18% align="center" bordercolor="#000000">Program</td>
<td width=15% align="center" bordercolor="#000000">Deposit/RCB</td>
<td width=15% align="center" bordercolor="#000000">UserName</td>
<td width=18% align="center" bordercolor="#000000">EC-NO</td>
<td width=24% align="center" bordercolor="#000000">Status</td>
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


<?php if (substr ( $this->_tpl_vars['r_info'][$this->_sections['l']['index']]['date'] , 0 , 10 ) == $this->_tpl_vars['n_info'][$this->_sections['n']['index']]['rcb_date']): ?> 

<tr bgcolor="#FFFFFF">
<td  align="center"><?php echo $this->_tpl_vars['r_info'][$this->_sections['l']['index']]['time']; ?>
</td>
<td  align="center"><?php echo $this->_tpl_vars['r_info'][$this->_sections['l']['index']]['name']; ?>
</td>
<td  align="center">$<?php echo $this->_tpl_vars['r_info'][$this->_sections['l']['index']]['deposit']; ?>
/$<?php echo $this->_tpl_vars['r_info'][$this->_sections['l']['index']]['rcb']; ?>
</td>
<td  align="center"><?php echo $this->_tpl_vars['r_info'][$this->_sections['l']['index']]['username']; ?>
</td>
<td  align="center"><?php echo $this->_tpl_vars['r_info'][$this->_sections['l']['index']]['ec']; ?>
-<?php echo $this->_tpl_vars['r_info'][$this->_sections['l']['index']]['ecno']; ?>
</td>
<td  align="center"><?php echo $this->_tpl_vars['r_info'][$this->_sections['l']['index']]['status']; ?>
</td>

</tr>

<?php endif; ?>


<?php endfor; endif; ?>

</table>

<?php endfor; endif; ?>


<?php if ($this->_tpl_vars['colpages'] > 1): ?>
<center>
<?php if ($this->_tpl_vars['prev_page'] > 0): ?>
 <a href="/?a=allrcbrequest&page=<?php echo $this->_tpl_vars['prev_page']; ?>
">&lt;&lt;</a>
<?php endif; ?>
<?php if (isset($this->_sections['p'])) unset($this->_sections['p']);
$this->_sections['p']['name'] = 'p';
$this->_sections['p']['loop'] = is_array($_loop=$this->_tpl_vars['pages']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['p']['show'] = true;
$this->_sections['p']['max'] = $this->_sections['p']['loop'];
$this->_sections['p']['step'] = 1;
$this->_sections['p']['start'] = $this->_sections['p']['step'] > 0 ? 0 : $this->_sections['p']['loop']-1;
if ($this->_sections['p']['show']) {
    $this->_sections['p']['total'] = $this->_sections['p']['loop'];
    if ($this->_sections['p']['total'] == 0)
        $this->_sections['p']['show'] = false;
} else
    $this->_sections['p']['total'] = 0;
if ($this->_sections['p']['show']):

            for ($this->_sections['p']['index'] = $this->_sections['p']['start'], $this->_sections['p']['iteration'] = 1;
                 $this->_sections['p']['iteration'] <= $this->_sections['p']['total'];
                 $this->_sections['p']['index'] += $this->_sections['p']['step'], $this->_sections['p']['iteration']++):
$this->_sections['p']['rownum'] = $this->_sections['p']['iteration'];
$this->_sections['p']['index_prev'] = $this->_sections['p']['index'] - $this->_sections['p']['step'];
$this->_sections['p']['index_next'] = $this->_sections['p']['index'] + $this->_sections['p']['step'];
$this->_sections['p']['first']      = ($this->_sections['p']['iteration'] == 1);
$this->_sections['p']['last']       = ($this->_sections['p']['iteration'] == $this->_sections['p']['total']);
?>
<?php if ($this->_tpl_vars['pages'][$this->_sections['p']['index']]['current'] == 1): ?>
<?php echo $this->_tpl_vars['pages'][$this->_sections['p']['index']]['page']; ?>

<?php else: ?>
 <a href="/?a=allrcbrequest&page=<?php echo $this->_tpl_vars['pages'][$this->_sections['p']['index']]['page']; ?>
"><?php echo $this->_tpl_vars['pages'][$this->_sections['p']['index']]['page']; ?>
</a>
<?php endif; ?>
<?php endfor; endif; ?>
<?php if ($this->_tpl_vars['next_page'] > 0): ?>
 <a href="/?a=allrcbrequest&page=<?php echo $this->_tpl_vars['next_page']; ?>
">&gt;&gt;</a>
<?php endif; ?>
</center>
<?php endif; ?>


<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>