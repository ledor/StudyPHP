<?php /* Smarty version 2.6.2, created on 2010-04-09 17:51:02
         compiled from view_votes.tpl */ ?>
<br><div class="list_text"><div align="center"><img src="images/t1.gif" align="absMiddle"> <a class="list_menu">Ratings stats for <b><?php echo $this->_tpl_vars['listing']['name']; ?>
</b></a>
<hr size=1 noshade="noshade" style="border:1px #cccccc dotted"></div>

<table width="100%" border="0">
<tr><td align="left" width="15%">Very good</td>
<td align="left"><img src="images/r3.gif" align="absmiddle"> (<?php echo $this->_tpl_vars['listing']['votes_summary']['3']; ?>
 votes)</td></tr>
<td align="left">Good</td>
<td align="left"><img src="images/r2.gif" align="absmiddle"> (<?php echo $this->_tpl_vars['listing']['votes_summary']['2']; ?>
 votes)</td></tr>
<td align="left">Bad</td>
<td align="left"><img src="images/r1.gif" align="absmiddle"> (<?php echo $this->_tpl_vars['listing']['votes_summary']['1']; ?>
 votes)</td></tr>
<td align="left">Very bad</td>
<td align="left"><img src="images/r0.gif" align="absmiddle"> (<?php echo $this->_tpl_vars['listing']['votes_summary']['0']; ?>
 votes)</td>
</tr>
</table><br>


<a name="vote"></a>
<form method=post name=vote onsubmit="return procVote()">
<input type="hidden" name="a" value="add_vote">
<input type="hidden" name="action" value="save">
<input type="hidden" name="lid" value="<?php echo $this->_tpl_vars['listing']['id']; ?>
">
<table cellspacing=0 cellpadding=2 border=0 width=100%>
<tr>
 <td colspan=3 class=title align=center>your Vote for <b><?php echo $this->_tpl_vars['listing']['name']; ?>
</b></td>
</tr>
<tr>
  <td colspan=3><table width="100%"  border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td width=25% height=50 align=center><input type="radio" name="vote" value=3>
    Very Good <img src="images/r3.gif" alt="Very Good" title="Very Good"></td>

      <td width=25% align=center><input type="radio" name="vote" value=2 checked>
    Good <img src="images/r2.gif" alt="Good" title="Good"></td>

      <td width=25% align=center><input type="radio" name="vote" value=1>
    Bad <img src="images/r1.gif" alt="Bad" title="Bad"></td>

      <td width=25% align=center><input type="radio" name="vote" value=0>
    Very Bad <img src="images/r0.gif" alt="Very Bad" title="Very Bad"></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </table></td>
</tr>
<tr>
  <td colspan=3>
You can write short comment (max. 255 chars):<br>
<textarea name="comment" class="inpts" cols=65 rows=5></textarea>
  </td>
</tr>
<tr>
  <td colspan=3>
Your e-mail<?php if ($this->_tpl_vars['settings']['vote_confirmation_require']): ?> (we will send you your vote confirmation code)<?php endif; ?>:<br>
<input type="text" name="email" class=inpts size=40>
  </td>
</tr>
<tr>
  <td colspan=3><input type="submit" value="Vote" class=sbmt></td>
</tr></table></form>

<?php if ($this->_tpl_vars['votes']): ?>
<div style="text-align:left;">Latest 100 ratings:</div>

<table width="100%" cellspacing="0" cellpadding="3" border="0">
<tr style="background-color: #cccccc">
  <td align=center>Rating</td>
  <td align=center>User IP</td>
  <td align=center>User E-Mail</td>
  <td align=center>Date</td>
</tr>

<?php if (isset($this->_sections['v'])) unset($this->_sections['v']);
$this->_sections['v']['name'] = 'v';
$this->_sections['v']['loop'] = is_array($_loop=$this->_tpl_vars['votes']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['v']['show'] = true;
$this->_sections['v']['max'] = $this->_sections['v']['loop'];
$this->_sections['v']['step'] = 1;
$this->_sections['v']['start'] = $this->_sections['v']['step'] > 0 ? 0 : $this->_sections['v']['loop']-1;
if ($this->_sections['v']['show']) {
    $this->_sections['v']['total'] = $this->_sections['v']['loop'];
    if ($this->_sections['v']['total'] == 0)
        $this->_sections['v']['show'] = false;
} else
    $this->_sections['v']['total'] = 0;
if ($this->_sections['v']['show']):

            for ($this->_sections['v']['index'] = $this->_sections['v']['start'], $this->_sections['v']['iteration'] = 1;
                 $this->_sections['v']['iteration'] <= $this->_sections['v']['total'];
                 $this->_sections['v']['index'] += $this->_sections['v']['step'], $this->_sections['v']['iteration']++):
$this->_sections['v']['rownum'] = $this->_sections['v']['iteration'];
$this->_sections['v']['index_prev'] = $this->_sections['v']['index'] - $this->_sections['v']['step'];
$this->_sections['v']['index_next'] = $this->_sections['v']['index'] + $this->_sections['v']['step'];
$this->_sections['v']['first']      = ($this->_sections['v']['iteration'] == 1);
$this->_sections['v']['last']       = ($this->_sections['v']['iteration'] == $this->_sections['v']['total']);
?>
<tr bgcolor=<?php if ($this->_sections['v']['rownum'] % 2 != 0): ?>#f2f2f2<?php else: ?>#ffffff<?php endif; ?>>
  <td align=center>
   <?php if ($this->_tpl_vars['votes'][$this->_sections['v']['index']]['vote'] == 0): ?><img src="images/r0.gif" alt="Very Bad" title="Very Bad"><?php endif; ?>
   <?php if ($this->_tpl_vars['votes'][$this->_sections['v']['index']]['vote'] == 1): ?><img src="images/r1.gif" alt="Bad" title="Bad"><?php endif; ?>
   <?php if ($this->_tpl_vars['votes'][$this->_sections['v']['index']]['vote'] == 2): ?><img src="images/r2.gif" alt="Good" title="Good"><?php endif; ?>
   <?php if ($this->_tpl_vars['votes'][$this->_sections['v']['index']]['vote'] == 3): ?><img src="images/r3.gif" alt="Very Good" title="Very Good"><?php endif; ?>
  </td>
  <td align="center"><?php echo $this->_tpl_vars['votes'][$this->_sections['v']['index']]['ip']; ?>
</td>
  <td align="center"><?php echo $this->_tpl_vars['votes'][$this->_sections['v']['index']]['email']; ?>
</td>
  <td align=center><?php echo $this->_tpl_vars['votes'][$this->_sections['v']['index']]['fdate']; ?>
</td>
</tr>
<?php if ($this->_tpl_vars['votes'][$this->_sections['v']['index']]['comment']): ?>
<tr>
  <td>&nbsp;</td>
  <td colspan=3 align="left"><img src="images/vcom.gif" alt=""> <font color="<?php if ($this->_tpl_vars['votes'][$this->_sections['v']['index']]['vote'] == 0): ?>red<?php endif;  if ($this->_tpl_vars['votes'][$this->_sections['v']['index']]['vote'] == 1): ?>orange<?php endif;  if ($this->_tpl_vars['votes'][$this->_sections['v']['index']]['vote'] == 2): ?>#CBA903<?php endif;  if ($this->_tpl_vars['votes'][$this->_sections['v']['index']]['vote'] == 3): ?>green<?php endif; ?>"><?php echo $this->_tpl_vars['votes'][$this->_sections['v']['index']]['comment']; ?>
</td>
</tr>
<?php endif; ?>
<?php endfor; endif; ?>
</table>
<?php endif; ?>
<br><br>