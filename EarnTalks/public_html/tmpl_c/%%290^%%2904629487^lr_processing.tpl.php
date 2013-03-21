<?php /* Smarty version 2.6.2, created on 2011-12-30 06:39:46
         compiled from lr_processing.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>



<?php if ($this->_tpl_vars['say'] == 'notsuccess'): ?>
<h3>Sorry! Payment is not successful:</h3>
Your payment is not successful!<br>

If you need some help please use our online contact form:<a href="?a=support">CLICK HERE!</a><br />
<br>

<?php else:  if ($this->_tpl_vars['say'] == 'success'): ?>
<h3>Congratulations!</h3>
<p>Your program has be successfully added and approved.<br />
  You Payment $<?php echo $this->_tpl_vars['amount']; ?>
 from LR account #<?php echo $this->_tpl_vars['account']; ?>
 batch #<?php echo $this->_tpl_vars['batch']; ?>
 has be successfully tranfered to our LR Account!</p>
<p>A email has been sent to you email <?php echo $this->_tpl_vars['email']; ?>
 . <br />
  <br />
  Your MONITOR CODE can be found at : <br />
  <a href=<?php echo $this->_tpl_vars['settings']['site_url']; ?>
?a=details&lid=<?php echo $this->_tpl_vars['lid']; ?>
>CLICK HERE TO GET YOU MONITOR CODE!</a><br />
  <br />
  You can also buy some advertises(banners or Text) ,more infomation at: <br />
  
  <a href=<?php echo $this->_tpl_vars['settings']['site_url']; ?>
?a=advertise><?php echo $this->_tpl_vars['settings']['site_url']; ?>
?a=advertise</a>
  
  <br />
  <?php endif; ?>
 <?php endif; ?>
  
  
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?> </p>