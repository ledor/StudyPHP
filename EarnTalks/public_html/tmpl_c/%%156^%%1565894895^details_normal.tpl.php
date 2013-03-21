<?php /* Smarty version 2.6.2, created on 2011-12-30 05:29:18
         compiled from details_normal.tpl */ ?>
<div class="list_side">
<table width=100% border=0 cellspacing=0 cellpadding=0>
<tr><td height=24 bgcolor="#EEEEEE">
<table width=100% border=0 cellspacing=0 cellpadding=0 height=24>
<tr><td class="list_title"><img src="images/rv.gif" width=13 height=12 align="left">
<div class="list_name" align="left"><a href="?a=go&lid=<?php echo $this->_tpl_vars['listing']['id']; ?>
" target="_blank"><?php echo $this->_tpl_vars['listing']['name']; ?>
</a><?php if ($this->_tpl_vars['listing']['new']): ?> <img src="images/new_ani.gif" border=0><?php endif; ?></div></td>
<td align="right"><div class="list_ds" align="right"><b><a href="?a=details&lid=<?php echo $this->_tpl_vars['listing']['id']; ?>
">Details</a></b> | <b><?php if ($this->_tpl_vars['userinfo']['logged']):  if (! $this->_tpl_vars['myhyips']): ?><a href="?a=bookmarks&action=add&lid=<?php echo $this->_tpl_vars['listing']['id']; ?>
">Add to My Programs<?php else: ?><a href="?a=bookmarks&action=delete&lid=<?php echo $this->_tpl_vars['listing']['id']; ?>
" onclick="return confirm('Do you really want to delete this listing?')">Delete<?php endif;  else: ?><a href="javascript:alert('Only available to registered users');">Add to My Programs<?php endif; ?></a></b> | <b><a href="?a=report_scam&lid=<?php echo $this->_tpl_vars['listing']['id']; ?>
">Report SCAM</a></b></div></td></tr></table></td></tr>

<tr><td valign="top"><div class="list_info">

<table width=100% border=0 cellspacing=0 cellpadding=0>


<tr><td width=170 align="center"><a href="?a=go&lid=<?php echo $this->_tpl_vars['listing']['id']; ?>
" target="_blank"><img src='http://capture.heartrails.com/medium?<?php echo $this->_tpl_vars['listing']['url']; ?>
' width="160" border="0" height="115"></img></a></td>
<td valign="top">
<table width=100% border=0 cellspacing=0 cellpadding=2>
<tr><td width=190 align="left" class="list_text"><img src="images/h_<?php echo $this->_tpl_vars['listing']['hyip_status']; ?>
.gif" width=108 height=25></td>
<td width=190 align="left" class="list_text"> <?php if (isset($this->_sections['p'])) unset($this->_sections['p']);
$this->_sections['p']['name'] = 'p';
$this->_sections['p']['loop'] = is_array($_loop=$this->_tpl_vars['listing']['payments']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
?><img src="images/<?php echo $this->_tpl_vars['listing']['payments'][$this->_sections['p']['index']]['system']; ?>
.gif" width=60 height=21 class="list_eg"><?php endfor; endif; ?></td>
</tr>

<tr><td align="left" class="list_text"><div align="left">Our Investment: <B>$<?php echo $this->_tpl_vars['listing']['spend']; ?>
</B></div></td>
<td align="left" class="list_text">User Votes: <B><?php if ($this->_tpl_vars['listing']['cvotes'] > 1):  echo $this->_tpl_vars['listing']['cvotes']; ?>
 votes<?php else:  echo $this->_tpl_vars['listing']['cvotes']; ?>
 vote<?php endif; ?></B></td></tr>
<tr><td align="left" class="list_text">Payout Ratio: <B><?php echo $this->_tpl_vars['listing']['ratio']*100; ?>
%  <?php if ($this->_tpl_vars['listing']['ratio'] > 1): ?><font color="#ff0000">in profit</font><?php endif; ?></B></td>
<td align="left" class="list_text">Our Rating: <?php if (isset($this->_sections['r'])) unset($this->_sections['r']);
$this->_sections['r']['name'] = 'r';
$this->_sections['r']['loop'] = is_array($_loop=$this->_tpl_vars['listing']['rates']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['r']['show'] = true;
$this->_sections['r']['max'] = $this->_sections['r']['loop'];
$this->_sections['r']['step'] = 1;
$this->_sections['r']['start'] = $this->_sections['r']['step'] > 0 ? 0 : $this->_sections['r']['loop']-1;
if ($this->_sections['r']['show']) {
    $this->_sections['r']['total'] = $this->_sections['r']['loop'];
    if ($this->_sections['r']['total'] == 0)
        $this->_sections['r']['show'] = false;
} else
    $this->_sections['r']['total'] = 0;
if ($this->_sections['r']['show']):

            for ($this->_sections['r']['index'] = $this->_sections['r']['start'], $this->_sections['r']['iteration'] = 1;
                 $this->_sections['r']['iteration'] <= $this->_sections['r']['total'];
                 $this->_sections['r']['index'] += $this->_sections['r']['step'], $this->_sections['r']['iteration']++):
$this->_sections['r']['rownum'] = $this->_sections['r']['iteration'];
$this->_sections['r']['index_prev'] = $this->_sections['r']['index'] - $this->_sections['r']['step'];
$this->_sections['r']['index_next'] = $this->_sections['r']['index'] + $this->_sections['r']['step'];
$this->_sections['r']['first']      = ($this->_sections['r']['iteration'] == 1);
$this->_sections['r']['last']       = ($this->_sections['r']['iteration'] == $this->_sections['r']['total']);
 if ($this->_tpl_vars['listing']['rates'][$this->_sections['r']['index']]['star']): ?><img src="images/full_star.gif" align=absmiddle><?php else: ?><img src="images/empty_star.gif" align=absmiddle><?php endif;  endfor; endif; ?></td>
</tr>
<tr>
<td align="left" class="list_text">Minimum Spend: <B><?php if ($this->_tpl_vars['listing']['min_spend']): ?>$<?php echo $this->_tpl_vars['listing']['min_spend'];  else: ?>$0.01<?php endif; ?></B></td>
<td align="left" class="list_text">Referral: <B><?php if ($this->_tpl_vars['listing']['referral']):  echo $this->_tpl_vars['listing']['referral'];  else: ?>No<?php endif; ?></B></td>
</tr>
<tr><td align="left" class="list_text">Maximum Spend: <B><?php if ($this->_tpl_vars['listing']['max_spend']): ?>$<?php echo $this->_tpl_vars['listing']['max_spend'];  else: ?>No Limit<?php endif; ?></B></td>
<td align="left" class="list_text">Withdrawal: <B><?php if ($this->_tpl_vars['listing']['withdrawal_type'] == 1): ?>Manual<?php endif; ?>
                     <?php if ($this->_tpl_vars['listing']['withdrawal_type'] == 2): ?>Instant<?php endif; ?>
                     <?php if ($this->_tpl_vars['listing']['withdrawal_type'] == 3): ?>Automatic<?php endif; ?></B>

<br><?php if (checkrcb ( $this->_tpl_vars['listing']['id'] )):  endif; ?>

</td>
</tr>
</table></td></tr>
<tr><td><div class="list_text"><?php if ($this->_tpl_vars['listing']['support_email']): ?><B>Contact Info: </B> <a href="mailto:<?php echo $this->_tpl_vars['listing']['support_email']; ?>
"><img alt="Support Email" src="images/smail.gif" align="absMiddle" border=0></a><?php endif; ?> </div></td>
<td align="left" class="list_text">Plans: <B><?php if ($this->_tpl_vars['listing']['percents']):  echo $this->_tpl_vars['listing']['percents'];  else: ?>Various Plans<?php endif; ?></B></td>
</tr>

<tr><td class="list_text"><?php if ($this->_tpl_vars['listing']['support_forum'] || $this->_tpl_vars['listing']['support_form'] || $this->_tpl_vars['listing']['support_aim']): ?> <?php if ($this->_tpl_vars['listing']['support_forum']): ?><a href="<?php echo $this->_tpl_vars['listing']['support_forum']; ?>
" target=_blank><b><center><img src="images/i_mmg.png" width="39" border="0" height="37"></b></a><?php endif; ?> <?php if ($this->_tpl_vars['listing']['support_form']): ?>&nbsp;&nbsp;&nbsp;&nbsp; <a href="<?php echo $this->_tpl_vars['listing']['support_form']; ?>
" target="_blank"><b><img src="images/i_talkgold.png" width="39" border="0" height="37"></b></a><?php endif; ?> <?php if ($this->_tpl_vars['listing']['support_aim']): ?>&nbsp;&nbsp;&nbsp;&nbsp; <a href="<?php echo $this->_tpl_vars['listing']['support_aim']; ?>
" target="_blank"><b><img src="images/i_dtm.png" width="39" border="0" height="37"></b></a></center><?php endif; ?>
</td>
<?php endif; ?>
<td colspan=2 align="right" class="list_text" style="color: #666666">Monitored Days: <B><?php echo $this->_tpl_vars['listing']['monitored']; ?>
</B><span style="margin-left: 10px">Added: <B><?php echo $this->_tpl_vars['listing']['added']; ?>
</B></span></td>
</tr>
</table>
</div>
</td></tr>
</table></div>