<?php /* Smarty version 2.6.2, created on 2011-12-18 09:35:25
         compiled from news.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>


<h3 align=left >News:</h3>

<table cellspacing=1 cellpadding=2 border=0 width=100%>
<?php if ($this->_tpl_vars['news']):  if (isset($this->_sections['s'])) unset($this->_sections['s']);
$this->_sections['s']['name'] = 's';
$this->_sections['s']['loop'] = is_array($_loop=$this->_tpl_vars['news']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
<tr>
 <td align=left class=<?php if ($this->_tpl_vars['news'][$this->_sections['s']['index']]['sponsored']): ?>newsspons<?php else: ?>news<?php endif; ?>><a name="<?php echo $this->_tpl_vars['news'][$this->_sections['s']['index']]['id']; ?>
"></a><b><?php echo $this->_tpl_vars['news'][$this->_sections['s']['index']]['title']; ?>
</b><br>
  <?php echo $this->_tpl_vars['news'][$this->_sections['s']['index']]['full_text']; ?>
<br>
  <span class=newsdate><?php echo $this->_tpl_vars['news'][$this->_sections['s']['index']]['d']; ?>
</span>
 </td>
</tr>
<?php endfor; endif;  else: ?>
<tr>
 <td colspan=3 align=left>No news found.</td>
</tr>
<?php endif; ?>
</table>

<?php if ($this->_tpl_vars['colpages'] > 1): ?>
<center>
<?php if ($this->_tpl_vars['prev_page'] > 0): ?>
 <a href="?a=news&page=<?php echo $this->_tpl_vars['prev_page']; ?>
">&lt;&lt;</a>
<?php endif;  if (isset($this->_sections['p'])) unset($this->_sections['p']);
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
 if ($this->_tpl_vars['pages'][$this->_sections['p']['index']]['current'] == 1):  echo $this->_tpl_vars['pages'][$this->_sections['p']['index']]['page']; ?>

<?php else: ?>
 <a href="?a=news&page=<?php echo $this->_tpl_vars['pages'][$this->_sections['p']['index']]['page']; ?>
"><?php echo $this->_tpl_vars['pages'][$this->_sections['p']['index']]['page']; ?>
</a>
<?php endif;  endfor; endif;  if ($this->_tpl_vars['next_page'] > 0): ?>
 <a href="?a=news&page=<?php echo $this->_tpl_vars['next_page']; ?>
">&gt;&gt;</a>
<?php endif; ?>
</center>
<?php endif; ?>


<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>