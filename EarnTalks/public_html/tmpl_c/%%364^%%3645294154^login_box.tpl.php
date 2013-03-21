<?php /* Smarty version 2.6.2, created on 2011-12-30 05:29:18
         compiled from login_box.tpl */ ?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr><td>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr><td width="6"><img src="images/box1.gif" width="6" height="28"></td>
<td class="box1"><img src="images/t7.gif" width="13" height="13" align="left">
<div class="side_title" align="left">Member Login</div></td>
<td width="6"><img src="images/box2.gif" width="6" height="28"></td>
</tr></table></td></tr>

<tr><td class="box2" valign="top">
<table cellspacing=0 cellpadding=4 border=0 width=100%>
<tr><td align=center style="width:120;height:60">
<?php if ($this->_tpl_vars['userinfo']['logged']): ?>
<tr height="20"><td align="left"><font size="1" color="#666666">Hello, <b><?php echo $this->_tpl_vars['userinfo']['username']; ?>
!</b></td></tr>
<tr height="20"><td align="left"> &#187; <a href="?a=accountmain"><b>Account Main</b></a></td></tr>
<tr height="20"><td align="left"> &#187; <a href="?a=bookmarks"><b>My Programs</b></a></td></tr>
<tr height="20"><td align="left"> &#187; <a href="?a=editprofile"><b>Edit Profile</b></a></td></tr>
<tr height="20"><td align="left"> &#187; <a href="?a=logout"><b>Log Out</b></a></font></td></tr>
<?php else: ?>
<form method="post" name="logform" style="margin: 0">
<input type="hidden" name="a" value="do_login">
<tr>
<td align="right"><font size="2">Username:</font></td>
<td align="left"><input type="text" name="username" class="inpts" size=15></td>
</tr>
<tr>
<td align="right"><font size="2">Password:</font></td>
<td align="left"><input type="password" name="password" class="inpts" size=15></td>
</tr>
<tr>
<td align="right">&nbsp;</td>
<td align="left"><input type="submit" value=" Login " class="sbmt"></td>
</tr>
<tr><td colspan=2>
<p style="margin: 2px 0 0 0"><a href="?a=register">Register</a> | <a href="?a=remindpassword">Forgot Password</a></p>
</td></tr></form>
<?php endif; ?>
  </td>

</tr>
</table>
<tr><td>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr><td width="6"><img src="images/box3.gif" width="6" height="6"></td>
<td class="box3"><img src="images/spacer.gif" width="1" height="1"></td>
<td width="6"><img src="images/box4.gif" width="6" height="6"></td>
</tr></table></td></tr></table><br>