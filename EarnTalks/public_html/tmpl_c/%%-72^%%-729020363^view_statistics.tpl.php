<?php /* Smarty version 2.6.2, created on 2010-04-09 17:50:58
         compiled from view_statistics.tpl */ ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title><?php echo $this->_tpl_vars['settings']['site_name']; ?>
</title>
<link href="style.css" rel="stylesheet" type="text/css">
</head>

<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" >
<center>
<table cellspacing=0 cellpadding=2 border=0 width=100%>
<tr>
 <th class=title><?php echo $this->_tpl_vars['settings']['site_name']; ?>
</th>
</tr>
</table>
<table cellspacing=1 cellpadding=2 border=0 width=100%>
<tr>
 <td colspan=4 class=detailsbg1>Payout Statistics for <b><?php echo $this->_tpl_vars['listing']['name']; ?>
</b></td>
</tr>
<tr>
 <td colspan=4 class=detailsbg2>
  <?php if ($this->_tpl_vars['listing']['hyip_status'] == 1): ?><img src="images/m_pay.gif" border=0 alt="Paying" title="Paying" align=absmiddle><?php endif; ?>
  <?php if ($this->_tpl_vars['listing']['hyip_status'] == 2): ?><img src="images/m_wait.gif" border=0 alt="Waiting" title="Waiting" align=absmiddle><?php endif; ?>
  <?php if ($this->_tpl_vars['listing']['hyip_status'] == 3): ?><img src="images/m_prob.gif" border=0 alt="Problem" title="Problem" align=absmiddle><?php endif; ?>
  <?php if ($this->_tpl_vars['listing']['hyip_status'] == 4): ?><img src="images/m_npay.gif" border=0 alt="Not Paying" title="Not Paying" align=absmiddle><?php endif; ?>
 </td>
</tr>
<tr>
 <td colspan=4 class=detailsbg1>Payouts Ratio: <b><?php echo $this->_tpl_vars['ratio']; ?>
 <?php if ($this->_tpl_vars['ratio'] >= 1): ?><font color=red>in profit</font><?php endif; ?></b></td>
</tr>
<tr>
 <td colspan=4 class=detailsbg1>Payouts Found: <b><?php echo $this->_tpl_vars['payouts']; ?>
</b></td>
</tr>
</table>

<table cellspacing=1 cellpadding=2 border=0 width=100%>
<tr>
 <th class=title>Date</th>
 <th class=title>Amount</th>
 <th class=title>Comment</th>
</tr>
<?php if ($this->_tpl_vars['stats']): ?>
<?php if (isset($this->_sections['s'])) unset($this->_sections['s']);
$this->_sections['s']['name'] = 's';
$this->_sections['s']['loop'] = is_array($_loop=$this->_tpl_vars['stats']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['s']['show'] = true;
$this->_sections['s']['max'] = $this->_sections['s']['loop'];
$this->_sections['s']['step'] = 1;
$this->_sections['s']['start'] = $this->_sections['s']['step'] > 0 ? 0 : $this->_sections['s']['loop']-1;
if ($this->_sections['s']['show']) {
    $this->_sections['s']['total'] = $this->_sections['s']['loop'];
    if ($this->_sections['s']['total'] == 0)
        $this->_sections['s']['show'] = false;
} else
    $this->_sections['s']['total'] = 0;
if ($this->_sections['s']['show']):

            for ($this->_sections['s']['index'] = $this->_sections['s']['start'], $this->_sections['s']['iteration'] = 1;
                 $this->_sections['s']['iteration'] <= $this->_sections['s']['total'];
                 $this->_sections['s']['index'] += $this->_sections['s']['step'], $this->_sections['s']['iteration']++):
$this->_sections['s']['rownum'] = $this->_sections['s']['iteration'];
$this->_sections['s']['index_prev'] = $this->_sections['s']['index'] - $this->_sections['s']['step'];
$this->_sections['s']['index_next'] = $this->_sections['s']['index'] + $this->_sections['s']['step'];
$this->_sections['s']['first']      = ($this->_sections['s']['iteration'] == 1);
$this->_sections['s']['last']       = ($this->_sections['s']['iteration'] == $this->_sections['s']['total']);
?>
<tr class=<?php if ($this->_sections['s']['rownum'] % 2 != 0): ?>detailsbg1<?php else: ?>detailsbg2<?php endif; ?>>
 <td><?php echo $this->_tpl_vars['stats'][$this->_sections['s']['index']]['fdate']; ?>
</td>
 <td>$<?php echo $this->_tpl_vars['stats'][$this->_sections['s']['index']]['amount']; ?>
</td>
 <td align=center><?php echo $this->_tpl_vars['stats'][$this->_sections['s']['index']]['comment']; ?>
</td>
</tr>
<?php endfor; endif; ?>
<?php else: ?>
<tr>
 <td colspan=4 align=center>No Payouts.</td>
</tr>
<?php endif; ?>
</table>
</center></body>
</html>