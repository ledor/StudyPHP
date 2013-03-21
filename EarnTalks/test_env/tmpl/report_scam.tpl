{include file="header.tpl"}
{literal}
<script type="text/javascript">
function checkform3() {
  if (document.repscam.eml.value == '') {
    alert("Please enter your e-mail address!");
    document.repscam.eml.focus();
    return false;
  }
  if (document.repscam.notify.value == '') {
    alert("Please let us know more information!");
    document.repscam.notify.focus();
    return false;
  }
  return true;
}
</script>
{/literal}
<table width=100% border=0 cellspacing=0 cellpadding=0><tr><td valign="middle"><div class="maintitle1" align="left"><img src="images/t_pl.png" width=11 height=24 align="left" /><div class="maintitle_text" align="left"><div align="left">REPORT SCAM</div></div></div></td></tr><tr><td class="main_line"><img src="images/spacer.gif" height=3 /></td></tr>
<tr><td><div class="list_side"><table width=100% border=0 cellspacing=0 cellpadding=0><tr><td valign="top"><div class="list_info">
{if $say eq 'send'}
<div align="center">Message has been successfully sent. Thank you.</div><br><br>
{else}
<div align="left">Please fill this form below to report SCAM:</div><br>
<form method="post" name="repscam" style="margin: 0" onSubmit="return checkform3();">
<input type="hidden" name="a" value="report_scam">
<input type="hidden" name="action" value="send">
<input type="hidden" name="lid" value="{$listing.id}">
<input type="hidden" name="hyip_name" value="{$listing.name}">
<input type="hidden" name="hyip_url" value="{$listing.url}">
<table width=100%>
<tr><td width=40% align="right">Program Name:</td>
<td width=60% align="left"><a href="?a=go&lid={$listing.id}" target="_blank"><b>{$listing.name}</b></a></td></tr>
<tr><td align="right">Your E-mail:</td>
<td align="left"><input class="inpts" name="eml" style="width:220px"></td></tr>
<tr><td align="right">Your Reason:</td>
<td align="left"><textarea class="inpts" style="width:220px; height:55px; overflow:auto" name="notify"></textarea></td></tr>
<tr><td>&nbsp</td>
<td align="left"><input type="submit" name="reportscam" value="Send" class="sbmt"></td></tr>
</table></form>
{/if}
</div></td></tr></table>
</td></tr></table>
{include file="footer.tpl"}