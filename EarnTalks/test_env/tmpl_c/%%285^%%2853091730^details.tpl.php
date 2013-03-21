<?php /* Smarty version 2.6.2, created on 2011-12-23 09:22:23
         compiled from details.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
  echo '
<script type="text/javascript">
var xmlHttp;
function createXMLHttpRequest() {
	if (window.ActiveXObject) {
		xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
	} else if (window.XMLHttpRequest) {
		xmlHttp = new XMLHttpRequest;
	} 
} 
function GetData(get_data, hId) {
	createXMLHttpRequest();
	var url="index.php?a=getdata&do="+get_data+"&lid="+hId;
	xmlHttp.open("GET", url, true);
	xmlHttp.onreadystatechange=CallBack;
	xmlHttp.send(null);
} 
function CallBack() {
	if (xmlHttp.readyState==1) {
		document.getElementById("data_type").innerHTML="<center>Loading...<img src=\\"images/loading.gif\\"></center>";
	} 
	if (xmlHttp.readyState==4 && xmlHttp.status==200) {
		document.getElementById("data_type").innerHTML="";
		document.getElementById("data_type").innerHTML=xmlHttp.responseText;
	} 
} 
function procVote()
{
  d = document.vote;
  if (!document.vote.email.value)
  {
    alert(\'Please, enter your E-Mail address!\');
    document.vote.email.focus();
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

  return true;
}
</script>
'; ?>


<table width=100% border=0 cellspacing=0 cellpadding=0>
<tr><td valign="middle"><div class="maintitle1" align="left"><img src="images/t_pl.png" width=11 height=24 align="left"><div class="maintitle_text" align="left">PROGRAM DETAILS</div></div></td></tr>
<tr><td class="main_line"><img src="images/spacer.gif" height=3></td></tr>
<tr><td><div class="list_side">

<?php if ($this->_tpl_vars['group']['type'] == 'Premium'):  $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "details_premium2.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
  endif;  if ($this->_tpl_vars['group']['type'] == 'Normal'):  $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "details_normal2.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
  endif;  if ($this->_tpl_vars['group']['type'] == 'Trial'):  $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "details_trial2.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
  endif;  if ($this->_tpl_vars['group']['type'] == 'Autosurf'):  $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "details_autosurf2.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
  endif;  if ($this->_tpl_vars['group']['type'] == 'Free'):  $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "details_free.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
  endif;  if ($this->_tpl_vars['group']['type'] == 'Games'):  $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "details_games.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
  endif;  if ($this->_tpl_vars['group']['type'] == 'Scam'):  $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "details_scam.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
  endif;  if ($this->_tpl_vars['group']['type'] == 'Closed'):  $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "details_closed.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
  endif; ?>
</td></tr>
<tr><td height=26><div class="list_side">
<table width=100% border=0 cellspacing=0 cellpadding=0>
<tr><td><div class="butx1" style="padding-left: 110px"><img src="images/but1.gif" width=6 height=22></div><div class="butx2"><a style="cursor:pointer" onclick="GetData('whois', '<?php echo $this->_tpl_vars['listing']['id']; ?>
')" class="list_menu">Whois</a></div><div class="butx3"><img src="images/but2.gif" width=6 height=22 /></div><div class="butx1"><img src="images/but1.gif" width=6 height=22 /></div><div class="butx2"><a style="cursor:pointer" onclick="GetData('traffic', '<?php echo $this->_tpl_vars['listing']['id']; ?>
')" class="list_menu">Traffic Count</a></div><div class="butx3"><img src="images/but2.gif" width=6 height=22 /></div><div class="butx1"><img src="images/but1.gif" width=6 height=22 /></div><div class="butx2"><a style="cursor:pointer" onclick="GetData('paystat', '<?php echo $this->_tpl_vars['listing']['id']; ?>
')" class="list_menu">Payout Stats</a></div><div class="butx3"><img src="images/but2.gif" width=6 height=22 /></div><div class="butx1"><img src="images/but1.gif" width=6 height=22 /></div><div class="butx2"><a style="cursor:pointer" onclick="GetData('votes', '<?php echo $this->_tpl_vars['listing']['id']; ?>
')" class="list_menu">Votes</a></div><div class="butx3"><img src="images/but2.gif" width=6 height=22 /></div><div class="butx1"><img src="images/but1.gif" width=6 height=22 /></div><div class="butx2"><a style="cursor:pointer" onclick="GetData('button', '<?php echo $this->_tpl_vars['listing']['id']; ?>
')" class="list_menu">Monitor Button</a></div><div class="butx3"><img src="images/but2.gif" width=6 height=22></div>
</td></tr>
<tr><td width=100%><div id="data_type"></div>
</td></tr></table></div>
</td></tr></table>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>