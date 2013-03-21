<?php /* Smarty version 2.6.2, created on 2010-04-09 17:49:26
         compiled from newlistings_box.tpl */ ?>
<table width=100% border=0 cellspacing=0 cellpadding=0>
<tr><td>
<table width=100% border=0 cellspacing=0 cellpadding=0>
<tr><td width=6><img src="images/box1.gif" width=6 height=28></td>
<td class="box1"><img src="images/t2.gif" width=13 height=13 align="left">
<div class="side_title" align="left">New Listings:&nbsp;&nbsp;&nbsp;<img src="images/new.gif" ></div></td>
<td width=6><img src="images/box2.gif" width=6 height=28 /></td></tr></table>
</td></tr>
<tr><td class="box2" valign="top">
<table cellpadding="3" width="100%" cellspacing="0" border="0" class="adlight" align="center">
<?php if (isset($this->_sections['l'])) unset($this->_sections['l']);
$this->_sections['l']['name'] = 'l';
$this->_sections['l']['loop'] = is_array($_loop=$this->_tpl_vars['new_listings']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
<?php if ($this->_tpl_vars['new_listings'][$this->_sections['l']['index']]['data_type'] == 'date'): ?>
<tr>
 <td>
   <small><?php echo $this->_tpl_vars['new_listings'][$this->_sections['l']['index']]['date']; ?>
</small>
 </td>
</tr>
<?php else: ?>
<tr>
 <td align=left>
   <a href="?a=go&lid=<?php echo $this->_tpl_vars['new_listings'][$this->_sections['l']['index']]['id']; ?>
" target=_blank class=newlistingslink> <strong><?php echo $this->_tpl_vars['new_listings'][$this->_sections['l']['index']]['name']; ?>
</strong></a>
      <?php if ($this->_tpl_vars['new_listings'][$this->_sections['l']['index']]['hyip_status'] == 1): ?><font color="#009900"><strong>Paying</strong></font><?php endif; ?>
   <?php if ($this->_tpl_vars['new_listings'][$this->_sections['l']['index']]['hyip_status'] == 2): ?><font color="#666666"><strong>Waiting</strong></font><?php endif; ?>
   <?php if ($this->_tpl_vars['new_listings'][$this->_sections['l']['index']]['hyip_status'] == 3): ?><font color="#FF6600"><strong>Problem</strong></font><?php endif; ?>
   <?php if ($this->_tpl_vars['new_listings'][$this->_sections['l']['index']]['hyip_status'] == 4): ?><font color="#FF0000"><strong>Not Paying</strong></font><?php endif; ?>
   <br>
   <?php echo $this->_tpl_vars['new_listings'][$this->_sections['l']['index']]['percents']; ?>

 </td>
</tr>
<?php endif; ?>
<?php endfor; endif; ?>
</table>
</div></td></tr>
<tr><td><table width=100% border=0 cellspacing=0 cellpadding=0>
<tr><td width=6><img src="images/box3.gif" width=6 height=6></td>
<td class="box3"><img src="images/spacer.gif" width=1 height=1></td>
<td width=6><img src="images/box4.gif" width=6 height=6></td></tr></table>
</td></tr></table><br>