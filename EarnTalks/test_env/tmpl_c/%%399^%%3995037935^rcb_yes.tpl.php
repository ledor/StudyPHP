<?php /* Smarty version 2.6.2, created on 2011-12-23 10:34:59
         compiled from rcb_yes.tpl */ ?>
<?php require_once(SMARTY_DIR . 'core' . DIRECTORY_SEPARATOR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'rcb_yes.tpl', 162, false),)), $this); ?>
<?php echo '
<script>
function validate()
{
  var d = document.rcb_form;

  if (!d.username.value)
  {
    alert(\'Please enter your user name.\');
    d.username.focus();
    return false;
  }
  if (!d.ecno.value)
  {
    alert(\'Please enter your E-Currency No.\');
    d.ecno.focus();
    return false;
  }
  if (!d.deposit.value)
  {
    alert(\'Please enter your deposit.\');
    d.deposit.focus();
    return false;
  }


  if (isNaN(d.deposit.value))
   {
    alert(\'Please enter Number only.\');
    d.deposit.select();
     return   false;
   }   

  if (!d.email.value)
  {
    alert(\'Please, enter your E-Mail address!\');
    d.email.focus();
    return false;
  }
  else
  {
    a = d.email.value.indexOf(\'@\');
    b = d.email.value.indexOf(\'@\', a+1);
    c = d.email.value.lastIndexOf(\'.\');
    if (c < a+1) { c = -1; }
    if (a == -1 || b != -1 || c <= a + 2 || a < 1 || c + 2 >= d.email.value.length || c + 4 < d.email.value.length)
    {
      alert(\'Please, enter a valid E-Mail Address\');
      d.email.focus();
      return false;
    }
  }

 var tempd = d.username.value.toLowerCase();
  if (tempd.indexOf(\'<script\')>0 || tempd.indexOf(\'<iframe\')>0)
  {
  	 alert(\'Valid User Name!\');
	 d.username.focus();
	 return false;
  }
  
 tempd = d.deposit.value.toLowerCase();
    if (tempd.indexOf(\'<script\')>0 || tempd.indexOf(\'<iframe\')>0)
  {
  	 alert(\'Valid Deposit!\');
	 d.deposit.focus();
	 return false;
  }
  
   tempd = d.ecno.value.toLowerCase();  
   if (tempd.indexOf(\'<script\')>0 || tempd.indexOf(\'<iframe\')>0)
  {
  	 alert(\'Valid E-Currency No!\');
	 d.ecno.focus();
	 return false;
  }
  
  
}
</script>
'; ?>



<table cellspacing=0 cellpadding=0 border=0 width=100% class="listbody">  
<tr>
 <td> RCB For <b><?php echo $this->_tpl_vars['listing']['name']; ?>
</b></td>
</tr>

<tr>
<td>

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


<?php if ($this->_tpl_vars['r_info'][$this->_sections['l']['index']]['type'] == 'LD'):  if ($this->_tpl_vars['r_info'][$this->_sections['l']['index']]['depositfrom'] > 0): ?>
<tr bgcolor="#FFFFFF">
<td align="center">$<?php echo $this->_tpl_vars['r_info'][$this->_sections['l']['index']]['depositfrom']; ?>
-$<?php echo $this->_tpl_vars['r_info'][$this->_sections['l']['index']]['depositto']; ?>
</td>
<td align="center"><?php if ($this->_tpl_vars['r_info'][$this->_sections['l']['index']]['rcb'] > 0): ?> <?php echo $this->_tpl_vars['r_info'][$this->_sections['l']['index']]['ref']; ?>
% <?php else: ?> --- <?php endif; ?></td>
<td align="center"><?php if ($this->_tpl_vars['r_info'][$this->_sections['l']['index']]['rcb'] > 0): ?> <?php echo $this->_tpl_vars['r_info'][$this->_sections['l']['index']]['rcb']; ?>
% <?php else: ?> --- <?php endif; ?></td>
<td align="center"><?php if ($this->_tpl_vars['r_info'][$this->_sections['l']['index']]['bonus'] > 0): ?> $<?php echo $this->_tpl_vars['r_info'][$this->_sections['l']['index']]['bonus']; ?>
 <?php else: ?> --- <?php endif; ?></td>
<td align="center"><?php if ($this->_tpl_vars['r_info'][$this->_sections['l']['index']]['rcb2'] > 0): ?> <?php echo $this->_tpl_vars['r_info'][$this->_sections['l']['index']]['rcb2']; ?>
% <?php else: ?> --- <?php endif; ?></td>
<td align="center"><?php if ($this->_tpl_vars['r_info'][$this->_sections['l']['index']]['bonus2'] > 0): ?> $<?php echo $this->_tpl_vars['r_info'][$this->_sections['l']['index']]['bonus2']; ?>
 <?php else: ?> --- <?php endif; ?></td>

</tr>

<?php endif;  endif; ?>

<?php endfor; endif; ?>



<tr>
<td colspan=6> 


<br>Please fill in the form and submit to us. We will process it Asap. </td>
</tr>

<tr>
<td colspan=6>


<form method=post name="rcb_form" onsubmit="return validate()">
<input type="hidden" name="a" value="rcb">
<input type="hidden" name="action" value="submited">
<input type="hidden" name="lid" value="<?php echo $this->_tpl_vars['listing']['id']; ?>
">
<input type="hidden" name="program" value="<?php echo $this->_tpl_vars['listing']['name']; ?>
">
<input type="hidden" name="rcbrate" value="<?php echo $this->_tpl_vars['listing']['rcb']; ?>
">
<input type="hidden" name="refrate" value="<?php echo $this->_tpl_vars['listing']['refrate']; ?>
">
<table cellspacing=1 cellpadding=2 border=0 width=100%>
<br>
<tr>
 <td >* Your User Name:</td><td><input type="text" name="username" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['frm']['name'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
" class=inpts size=25></td>
</tr>
<tr>
 <td>* Your Deposited:</td><td><input type="text" name="deposit" value="1" class=inpts size=25></td>
</tr>

<tr>
 <td>* Contact E-mail:</td><td><input type="text" name="email" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['frm']['email'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
" class=inpts size=25></td>
</tr>
<tr>
<tr>
<td >* E-Currency: </td>
<td >
<input type='radio' name='ec' value='LR' checked>LR
<input type='radio' name='ec' value='PM' >PM
<input type='radio' name='ec' value='AP' >AP
<input type='radio' name='ec' value='STP' >STP
<input type='radio' name='ec' value='SP' >SP




</td>
</tr>

<tr>
 <td >* E-Currency No.:</td><td><input type="text" name="ecno" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['frm']['ecno'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
" class=inpts size=25></td>
</tr>


<tr>
  <td colspan=2>* - All required fields</td>
</tr>
<tr>
  <td colspan=2><input type="submit" value="Request Now &gt;&gt;" class=sbmt></td>
</tr>
</table>
</form>

</td></tr>

</table>

</td></tr>

</table>
