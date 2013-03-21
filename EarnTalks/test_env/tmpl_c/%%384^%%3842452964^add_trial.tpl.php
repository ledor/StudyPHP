<?php /* Smarty version 2.6.2, created on 2011-12-18 18:21:26
         compiled from add_trial.tpl */ ?>
<?php require_once(SMARTY_DIR . 'core' . DIRECTORY_SEPARATOR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'add_trial.tpl', 140, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<h3 align=left>Add listing to <?php echo $this->_tpl_vars['group']['name']; ?>
 list</h3>

<?php echo '
<script>
function validate()
{
  var d = document.add_form;
  if (!d.name.value)
  {
    alert(\'Please enter your Site Name.\');
    d.name.focus();
    return false;
  }
  if (!d.url.value)
  {
    alert(\'Please enter your Site URL.\');
    d.url.focus();
    return false;
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
 //edit by chiang
 var tempd = d.name.value.toLowerCase();
  if (tempd.indexOf(\'<script\')>0 || tempd.indexOf(\'<iframe\')>0)
  {
  	 alert(\'Valid Site Name!\');
	 d.name.focus();
	 return false;
  }
  
 tempd = d.url.value.toLowerCase();
    if (tempd.indexOf(\'<script\')>0 || tempd.indexOf(\'<iframe\')>0)
  {
  	 alert(\'Valid Site URL!\');
	 d.url.focus();
	 return false;
  }
  
   tempd = d.percents.value.toLowerCase();  
   if (tempd.indexOf(\'<script\')>0 || tempd.indexOf(\'<iframe\')>0)
  {
  	 alert(\'Valid percents!\');
	 d.percents.focus();
	 return false;
  }
  
  tempd = d.min_spend.value.toLowerCase(); 
   if (tempd.indexOf(\'<script\')>0 || tempd.indexOf(\'<iframe\')>0)
  {
  	 alert(\'Valid min_spend!\');
	 d.min_spend.focus();
	 return false;
  }
  
  tempd = d.max_spend.value.toLowerCase(); 
   if (tempd.indexOf(\'<script\')>0 || tempd.indexOf(\'<iframe\')>0)
  {
  	 alert(\'Valid max_spend!\');
	 d.max_spend.focus();
	 return false;
  }

tempd = d.referral.value.toLowerCase();
   if (tempd.indexOf(\'<script\')>0 || tempd.indexOf(\'<iframe\')>0)
  {
  	 alert(\'Valid referral!\');
	 d.referral.focus();
	 return false;
  }

tempd = d.description.value.toLowerCase();
   if (tempd.indexOf(\'<script\')>0 || tempd.indexOf(\'<iframe\')>0)
  {
  	 alert(\'Valid description!\');
	 d.description.focus();
	 return false;
  }
  
  //edit by chiang
  return true;
}
</script>
'; ?>


<?php if ($this->_tpl_vars['group']['add_description']):  echo $this->_tpl_vars['group']['add_description']; ?>

<br><br>
<?php endif; ?>

<?php if ($this->_tpl_vars['errors']):  if (isset($this->_sections['e'])) unset($this->_sections['e']);
$this->_sections['e']['name'] = 'e';
$this->_sections['e']['loop'] = is_array($_loop=$this->_tpl_vars['errors']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['e']['show'] = true;
$this->_sections['e']['max'] = $this->_sections['e']['loop'];
$this->_sections['e']['step'] = 1;
$this->_sections['e']['start'] = $this->_sections['e']['step'] > 0 ? 0 : $this->_sections['e']['loop']-1;
if ($this->_sections['e']['show']) {
    $this->_sections['e']['total'] = $this->_sections['e']['loop'];
    if ($this->_sections['e']['total'] == 0)
        $this->_sections['e']['show'] = false;
} else
    $this->_sections['e']['total'] = 0;
if ($this->_sections['e']['show']):

            for ($this->_sections['e']['index'] = $this->_sections['e']['start'], $this->_sections['e']['iteration'] = 1;
                 $this->_sections['e']['iteration'] <= $this->_sections['e']['total'];
                 $this->_sections['e']['index'] += $this->_sections['e']['step'], $this->_sections['e']['iteration']++):
$this->_sections['e']['rownum'] = $this->_sections['e']['iteration'];
$this->_sections['e']['index_prev'] = $this->_sections['e']['index'] - $this->_sections['e']['step'];
$this->_sections['e']['index_next'] = $this->_sections['e']['index'] + $this->_sections['e']['step'];
$this->_sections['e']['first']      = ($this->_sections['e']['iteration'] == 1);
$this->_sections['e']['last']       = ($this->_sections['e']['iteration'] == $this->_sections['e']['total']);
 if ($this->_tpl_vars['errors'][$this->_sections['e']['index']]['name'] == 'name'): ?>
<li style="color: red"> Please enter your Site Name<br></li>
<?php endif;  if ($this->_tpl_vars['errors'][$this->_sections['e']['index']]['name'] == 'url'): ?>
<li style="color: red"> Please enter your Site URL<br></li>
<?php endif;  if ($this->_tpl_vars['errors'][$this->_sections['e']['index']]['name'] == 'email'): ?>
<li style="color: red"> Please enter your Contact E-mail<br></li>
<?php endif;  if ($this->_tpl_vars['errors'][$this->_sections['e']['index']]['name'] == 'invalid_email'): ?>
<li style="color: red"> Please enter valid Contact E-mail<br></li>
<?php endif;  endfor; endif; ?>
<br>
<?php endif; ?>

<br /><p align=left>
The minimal deposit is $<?php echo $this->_tpl_vars['settings']['trialmonitorfees']+$this->_tpl_vars['settings']['triallistingfees']; ?>
<font color="#FF0000">($<?php echo $this->_tpl_vars['settings']['trialmonitorfees']; ?>
+$<?php echo $this->_tpl_vars['settings']['triallistingfees']; ?>
)</font> of which <font color="#FF0000">$<?php echo $this->_tpl_vars['settings']['trialmonitorfees']; ?>
</font> will be invested into your program   for monitoring purposes. If your minimum is above our listing fee, please send   minimum investment.<br />
<br />
After entering and submitting the form below, you are   requested to make your minimal deposit through Libertyreserve, using our Libertyreserve   button.<br />
<br />
</p>

<form method=post name="add_form" onsubmit="return validate()">
<input type="hidden" name="a" value="add">
<input type="hidden" name="action" value="save">
<input type="hidden" name="type" value="<?php echo $this->_tpl_vars['frm']['type']; ?>
">
<table cellspacing=1 cellpadding=2 border=0 width=100%>
<tr align=left>
 <td width=30%>* Site Name:</td><td><input type="text" name="name" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['frm']['name'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
" class=inpts size=50></td>
</tr>
<tr align=left>
 <td>* Site URL:</td><td><input type="text" name="url" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['frm']['url'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
" class=inpts size=50></td>
</tr>
<tr align=left>
 <td>* Contact E-mail:</td><td><input type="text" name="email" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['frm']['email'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
" class=inpts size=50></td>
</tr>
<tr align=left>
 <td>Interest Percents:</td><td><input type="text" name="percents" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['frm']['percents'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
" class=inpts size=50></td>
</tr>
<tr align=left>
 <td>Minimal Spend:</td><td><input type="text" name="min_spend" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['frm']['min_spend'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
" class=inpts size=50></td>
</tr>
<tr align=left>
 <td>Maximal Spend:</td><td><input type="text" name="max_spend" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['frm']['max_spend'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
" class=inpts size=50></td>
</tr>
<tr align=left>
 <td>Referral Bonus:</td><td><input type="text" name="referral" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['frm']['referral'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
" class=inpts size=50></td>
</tr>
<tr align=left>
 <td>Withdrawal Type:</td>
 <td>
   <select name="withdrawal_type" class=inpts>
     <option value=1 <?php if ($this->_tpl_vars['frm']['withdrawal_type'] == 1): ?>selected<?php endif; ?>>Manual</option>
     <option value=2 <?php if ($this->_tpl_vars['frm']['withdrawal_type'] == 2): ?>selected<?php endif; ?>>Instant</option>
     <option value=3 <?php if ($this->_tpl_vars['frm']['withdrawal_type'] == 3): ?>selected<?php endif; ?>>Automatic</option>
   </select> </td>
</tr>
<tr align=left>
 <td>Support E-mail:</td><td><input type="text" name="support_email" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['frm']['support_email'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
" class=inpts size=50></td>
</tr>
<tr align=left>
 <td>TG Support Forum:</td><td><input type="text" name="support_form" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['frm']['support_form'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
" class=inpts size=50></td>
</tr>
<tr align=left>
 <td>MMG Support Forum:</td><td><input type="text" name="support_forum" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['frm']['support_forum'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
" class=inpts size=50></td>
</tr>
<tr align=left>
 <td>DTM Support Forum:</td><td><input type="text" name="support_aim" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['frm']['support_aim'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
" class=inpts size=50></td>
</tr>
<tr align=left>
  <td valign=top>Payment Methods:</td>
  <td>
<?php if (isset($this->_sections['p'])) unset($this->_sections['p']);
$this->_sections['p']['name'] = 'p';
$this->_sections['p']['loop'] = is_array($_loop=$this->_tpl_vars['payments']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
   <input type="checkbox" name="payments[<?php echo $this->_tpl_vars['payments'][$this->_sections['p']['index']]['name']; ?>
]" value=1 <?php if ($this->_tpl_vars['payments'][$this->_sections['p']['index']]['selected']): ?>checked<?php endif; ?>><?php echo $this->_tpl_vars['payments'][$this->_sections['p']['index']]['name']; ?>
 <br>
<?php endfor; endif; ?>  </td>
</tr>
<tr align=left>
  <td colspan=2>Description</td>
</tr>
<tr>
  <td colspan=2><textarea name="description" cols=82 rows=5 class=inpts><?php echo ((is_array($_tmp=$this->_tpl_vars['frm']['description'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
</textarea></td>
</tr>
<tr align=left>
  <td colspan=2>* - required fields</td>
</tr>
<tr align=left>
  <td colspan="2"><input style="width: 185px; height: 24px" type="submit" value="Add My Program Now" /></td>

</tr>
</table>
</form>


<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>