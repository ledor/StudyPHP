<?php /* Smarty version 2.6.2, created on 2010-04-09 17:50:11
         compiled from details_premium2.tpl */ ?>
<table width=100% border=0 cellspacing=0 cellpadding=0>
<tr><td valign="top"><div class="list_info">
<table width=100% border=0 cellspacing=0 cellpadding=0>
<tr><td width=170 align="center" valign="top">
<table width=100% border=0 cellspacing=0 cellpadding=2>

<tr><td align="center"><img src='http://www.shrinktheweb.com/xino.php?embed=1&STWAccessKeyId=4d1f49d5fb9b227&stwsize=lg&stwUrl=<?php echo $this->_tpl_vars['listing']['url']; ?>
 ' width="160" border="0" height="100"></td></tr>
<tr><td><table width=100% border=0 class="list_info_side1">
<tr><td width=170 align="center"><script type="text/javascript" language="JavaScript" src="http://xslt.alexa.com/site_stats/js/t/a?url=<?php echo $this->_tpl_vars['listing']['url']; ?>
" width=120 height=65></script>
</td></tr></table>
</td></tr>
<tr><td><table width=100% border=0 class="list_info_side1">
<tr><td width=170 align="center" style="word-break:break-all"><?php if (isset($this->_sections['p'])) unset($this->_sections['p']);
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
.gif" align="absmiddle" alt="<?php echo $this->_tpl_vars['listing']['payments'][$this->_sections['p']['index']]['system']; ?>
" title="<?php echo $this->_tpl_vars['listing']['payments'][$this->_sections['p']['index']]['system']; ?>
" width=60 height=21 style="margin: 2px 2px 0px 2px"><?php endfor; endif; ?></td></tr>
</table></td></tr></table></td>
<td valign="top"><table width=100% border=0 cellspacing=0 cellpadding=2>
<tr><td valign="top">
<table width=100% border=0 cellspacing=0 cellpadding=2>
<tr><td class="list_title"><img src="images/rv.gif" width=13 height=12 align="left"><div class="list_name" align="left"><a href="?a=go&lid=<?php echo $this->_tpl_vars['listing']['id']; ?>
" target="_blank"><?php echo $this->_tpl_vars['listing']['name']; ?>
</a><?php if ($this->_tpl_vars['listing']['new']): ?> <img src="images/new_ani.gif" border=0><?php endif; ?></div>
</td></tr>
<tr><td align="left" class="list_text"><img src="images/h_<?php echo $this->_tpl_vars['listing']['hyip_status']; ?>
.gif" width=108 height=25></td></tr>
<tr><td align="left" class="list_text"><?php echo $this->_tpl_vars['listing']['description']; ?>

<div style="text-align: right; color: #666666">Added: <?php echo $this->_tpl_vars['listing']['added']; ?>
</div></td></tr>
</table></td></tr>
<tr><td align="left" class="list_text"><table width=100% border=0 cellspacing=0 cellpadding=2>
<tr><td class="list_text" width=50%>Our Rating: <?php if (isset($this->_sections['r'])) unset($this->_sections['r']);
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
<td class="list_text" width=50%>User Votes: <b><?php echo $this->_tpl_vars['listing']['cvotes']; ?>
 votes</b></td></tr><tr><td class="list_text">Minimal Spend: <b><?php if ($this->_tpl_vars['listing']['min_spend']):  echo $this->_tpl_vars['listing']['min_spend'];  else: ?>0<?php endif; ?></b></td><td class="list_text">Maximal Spend: <b><?php if ($this->_tpl_vars['listing']['max_spend']): ?>$<?php echo $this->_tpl_vars['listing']['max_spend'];  else: ?>No Limit<?php endif; ?></b></td></tr><tr><td class="list_text">Referral: <b><?php if ($this->_tpl_vars['listing']['referral']):  echo $this->_tpl_vars['listing']['referral'];  else: ?>No<?php endif; ?></b></td>
<td class="list_text">Withdrawal: <b><?php if ($this->_tpl_vars['listing']['withdrawal_type'] == 1): ?>Manual<?php endif; ?>
                     <?php if ($this->_tpl_vars['listing']['withdrawal_type'] == 2): ?>Instant<?php endif; ?>
                     <?php if ($this->_tpl_vars['listing']['withdrawal_type'] == 3): ?>Automatic<?php endif; ?></b>
<br><?php if (checkrcb ( $this->_tpl_vars['listing']['id'] )):  endif; ?>

</td></tr>
<tr><td class="list_text">Our Investment: <b style="color: #007520">$<?php echo $this->_tpl_vars['listing']['spend']; ?>
</b></td>
<td class="list_text">Payout Ratio: <b style="color: #007520"><?php echo $this->_tpl_vars['listing']['ratio']*100; ?>
%</b></td></tr>
<tr><td class="list_text">Monitored Days: <b><?php echo $this->_tpl_vars['listing']['monitored']; ?>
</b></td>

<td class="list_text">Contact Info: <?php if ($this->_tpl_vars['listing']['support_email']): ?><a href="mailto:<?php echo $this->_tpl_vars['listing']['support_email']; ?>
"><img alt="Support Email" src="images/smail.gif" align="absMiddle" border=0></a><?php endif; ?> </td></tr>

<tr><td class="list_text" colspan=2>Plans: <b style="color: #990000"><?php if ($this->_tpl_vars['listing']['percents']):  echo $this->_tpl_vars['listing']['percents'];  else: ?>Various Plans<?php endif; ?></b></td></tr>
</table></td></tr></table></td></tr></table>

<?php if ($this->_tpl_vars['listing']['support_phone']): ?>
<table width=100% border=0 cellspacing=0 cellpadding=0>
<tr><td valign="middle"><div class="maintitle1" align="left"><img src="images/t_pl.png" width=11 height=24 align="left"><div class="maintitle_text" align="left">Our Review about <a href="?a=go&lid=<?php echo $this->_tpl_vars['listing']['id']; ?>
" target="_blank"><font color="white"><?php echo $this->_tpl_vars['listing']['name']; ?>
</font></a></div></div></td></tr>
<tr><td class="main_line"><img src="images/spacer.gif" height=3></td></tr></table>



<table width=100% border=0 cellspacing=0 cellpadding=0>
<p align=justify>
<?php echo $this->_tpl_vars['listing']['support_phone']; ?>
</p>

</div></td></tr></table>
<?php endif; ?>
