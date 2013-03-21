{literal}
<script language=javascript><!--
function validate_sub()
{
  if (!document.subscribe.email.value)
  {
    alert('Please, enter your E-Mail address!');
    document.subscribe.email.focus();
    return false;
  }
  else
  {
    a = document.subscribe.email.value.indexOf('@');
    b = document.subscribe.email.value.indexOf('@', a+1);
    c = document.subscribe.email.value.indexOf('.', a+1);
    if (a == -1 || b != -1 || c <= a + 2 || a < 1 || c + 2 >= document.subscribe.email.value.length || c + 4 < document.subscribe.email.value.length)
    {
      alert('Please, enter a valid E-Mail Address');
      document.subscribe.email.focus();
      return false;
    }
  }

  return true;
}
--></script>
{/literal}


<table width=100% border=0 cellspacing=0 cellpadding=0>
<tr><td>
<table width=100% border=0 cellspacing=0 cellpadding=0>
<tr><td width=6><img src="images/box1.gif" width=6 height=28></td>
<td class="box1"><img src="images/t2.gif" width=13 height=13 align="left">
<div class="side_title" align="left">Join our mailing list</div></td>
<td width=6><img src="images/box2.gif" width=6 height=28 /></td></tr></table>
</td></tr>
<tr><td class="box2" valign="top">
<table width=100% border=0 align="center" cellpadding=4 cellspacing=0>
<tr>
    <td align=left >  

<form method=post onsubmit="return validate_sub()" name="subscribe">
<input type="hidden" name="a" value="maillist">
<input type="hidden" name="display" value="">
<tr>
 <td align="right">E-mail:</td>
 <td><input name="email" type="text" class=inpts size="12"></td>
</tr>
<tr>
 <td align=right><input type="radio" name="action" value="subscribe" checked></td><td>Subscribe</td>
</tr>
<tr>
 <td align=right><input type="radio" name="action" value="unsubscribe"></td><td>Unsubscribe</td>
</tr>
<tr>
 <td colspan=2 align="center"><input type="submit" value="Submit" class=sbmt></td>
</tr>
</form>

</td></tr>
<tr>
<td colspan=2 align="center">We never send SPAM and we hate SPAMers. Please don't trust any e-mails that appeared to be from us but not stated on our Newsletters Archive!
</td>
</tr>
</table>
</div></td></tr>
</table>
<table width=100% border=0 cellspacing=0 cellpadding=0>
<tr><td width=6><img src="images/box3.gif" width=6 height=6></td>
<td class="box3"><img src="images/spacer.gif" width=1 height=1></td>
<td width=6><img src="images/box4.gif" width=6 height=6></td></tr></table>
<br>
