<?php /* Smarty version 2.6.2, created on 2011-12-30 05:29:18
         compiled from textads_box.tpl */ ?>
<table width=100% border=0 cellspacing=0 cellpadding=0>
<tr><td>
<table width=100% border=0 cellspacing=0 cellpadding=0>
<tr><td width=6><img src="images/box1.gif" width=6 height=28></td>
<td class="box1"><img src="images/t2.gif" width=13 height=13 align="left">
<div class="side_title" align="left">Text Ads</div></td>
<td width=6><img src="images/box2.gif" width=6 height=28 /></td></tr></table>
</td></tr>
<tr><td class="box2" valign="top">
<table width=100% border=0 align="center" cellpadding=4 cellspacing=0>

<?php if (isset($this->_sections['ad'])) unset($this->_sections['ad']);
$this->_sections['ad']['name'] = 'ad';
$this->_sections['ad']['loop'] = is_array($_loop=$this->_tpl_vars['textads']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['ad']['show'] = true;
$this->_sections['ad']['max'] = $this->_sections['ad']['loop'];
$this->_sections['ad']['step'] = 1;
$this->_sections['ad']['start'] = $this->_sections['ad']['step'] > 0 ? 0 : $this->_sections['ad']['loop']-1;
if ($this->_sections['ad']['show']) {
    $this->_sections['ad']['total'] = $this->_sections['ad']['loop'];
    if ($this->_sections['ad']['total'] == 0)
        $this->_sections['ad']['show'] = false;
} else
    $this->_sections['ad']['total'] = 0;
if ($this->_sections['ad']['show']):

            for ($this->_sections['ad']['index'] = $this->_sections['ad']['start'], $this->_sections['ad']['iteration'] = 1;
                 $this->_sections['ad']['iteration'] <= $this->_sections['ad']['total'];
                 $this->_sections['ad']['index'] += $this->_sections['ad']['step'], $this->_sections['ad']['iteration']++):
$this->_sections['ad']['rownum'] = $this->_sections['ad']['iteration'];
$this->_sections['ad']['index_prev'] = $this->_sections['ad']['index'] - $this->_sections['ad']['step'];
$this->_sections['ad']['index_next'] = $this->_sections['ad']['index'] + $this->_sections['ad']['step'];
$this->_sections['ad']['first']      = ($this->_sections['ad']['iteration'] == 1);
$this->_sections['ad']['last']       = ($this->_sections['ad']['iteration'] == $this->_sections['ad']['total']);
?>
<tr>
    <td align=center class=adlight>
         <a href="<?php echo $this->_tpl_vars['textads'][$this->_sections['ad']['index']]['url']; ?>
" target=_blank class=adlink><b><?php echo $this->_tpl_vars['textads'][$this->_sections['ad']['index']]['title']; ?>
</b></a><br>
         <div class=adtext align=justify><?php echo $this->_tpl_vars['textads'][$this->_sections['ad']['index']]['text']; ?>
</div>
</td></tr>
<tr>
<td background="images/shadow.gif" align="center"><?php if ($this->_tpl_vars['textads'][$this->_sections['ad']['index']]['expiration']): ?><span class=expiresdate>Expires on <?php echo $this->_tpl_vars['textads'][$this->_sections['ad']['index']]['exp_date']; ?>
</span><?php endif; ?>
</td>
</tr>
<?php endfor; endif; ?>
<tr>
 <td align=center><a href="?a=advertise&adtype=textads" class=smalllink>Place Your Text Ads Here! Only $<?php if (showminimin ( )):  endif; ?>/Week</a></td>
</tr>
</table>
</div></td></tr>
</table>
<table width=100% border=0 cellspacing=0 cellpadding=0>
<tr><td width=6><img src="images/box3.gif" width=6 height=6></td>
<td class="box3"><img src="images/spacer.gif" width=1 height=1></td>
<td width=6><img src="images/box4.gif" width=6 height=6></td></tr></table>
<br>