{include file="header.tpl"}
{literal}
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
		document.getElementById("data_type").innerHTML="<center>Loading...<img src=\"images/loading.gif\"></center>";
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
    alert('Please, enter your E-Mail address!');
    document.vote.email.focus();
    return false;
  }
  else
  {
    a = d.email.value.indexOf('@');
    b = d.email.value.indexOf('@', a+1);
    c = d.email.value.lastIndexOf('.');
    if (c < a+1) { c = -1; }
    if (a == -1 || b != -1 || c <= a + 2 || a < 1 || c + 2 >= d.email.value.length || c + 4 < d.email.value.length)
    {
      alert('Please, enter a valid E-Mail Address');
      d.email.focus();
      return false;
    }
  }

  return true;
}
</script>
{/literal}
<table width=100% border=0 cellspacing=0 cellpadding=0>
<tr><td valign="middle"><div class="maintitle1" align="left"><img src="images/t_pl.png" width=11 height=24 align="left"><div class="maintitle_text" align="left">PROGRAM DETAILS</div></div></td></tr>
<tr><td class="main_line"><img src="images/spacer.gif" height=3></td></tr>
<tr><td><div class="list_side">

{if $group.type == 'Premium'}
{include file="details_premium2.tpl"}
{/if}
{if $group.type == 'Normal'}
{include file="details_normal2.tpl"}
{/if}
{if $group.type == 'Trial'}
{include file="details_trial2.tpl"}
{/if}
{if $group.type == 'Autosurf'}
{include file="details_autosurf2.tpl"}
{/if}
{if $group.type == 'Free'}
{include file="details_free.tpl"}
{/if}
{if $group.type == 'Games'}
{include file="details_games.tpl"}
{/if}
{if $group.type == 'Scam'}
{include file="details_scam.tpl"}
{/if}
{if $group.type == 'Closed'}
{include file="details_closed.tpl"}
{/if}
</div></td></tr>

<tr><td height=26><div class="list_side">
<table width=100% border=0 cellspacing=0 cellpadding=0>
<tr><td><div class="butx1" style="padding-left: 160px"><img src="images/but1.gif" width=6 height=22></div><div class="butx2"><a style="cursor:pointer" onclick="GetData('whois', '{$listing.id}')" class="list_menu">Whois</a></div><div class="butx3"><img src="images/but2.gif" width=6 height=22 /></div><div class="butx1"><img src="images/but1.gif" width=6 height=22 /></div><div class="butx2"><a style="cursor:pointer" onclick="GetData('traffic', '{$listing.id}')" class="list_menu">Traffic Count</a></div><div class="butx3"><img src="images/but2.gif" width=6 height=22 /></div><div class="butx1"><img src="images/but1.gif" width=6 height=22 /></div><div class="butx2"><a style="cursor:pointer" onclick="GetData('paystat', '{$listing.id}')" class="list_menu">Payout Stats</a></div><div class="butx3"><img src="images/but2.gif" width=6 height=22 /></div>
</td></p></tr>
<tr><td width=100%><div id="data_type"></div>
</td></tr></table></div><br>

<table width=100% border=0 cellspacing=0 cellpadding=0>
<tr><td valign="middle"><div class="maintitle1" align="left"><img src="images/t_pl.png" width=11 height=24 align="left"><div class="maintitle_text" align="left">Vote for <a href="?a=go&lid={$listing.id}" target="_blank"><font color="white">{$listing.name}</font></a></div></div></td></tr>
<tr><td class="main_line"><img src="images/spacer.gif" height=3></td></tr></table>

<table>

<tr><td width=100%>&nbsp;</td></tr>
<tr><td width=100% bgcolor="#FFFFFF">
<table cellspacing=0 cellpadding=2 border=0 width=100%>
<tr>
  <td align=center width=25%>
   <img src="images/r3.gif" alt="Very Good" title="Very Good"><br>
   Very Good<br>
   <b>{$listing.votes_summary.3} votes</b>
  </td>
  <td align=center width=25%>
   <img src="images/r2.gif" alt="Good" title="Good"><br>
   Good<br>
   <b>{$listing.votes_summary.2} votes</b>
  </td>
  <td align=center width=25%>
   <img src="images/r1.gif" alt="Bad" title="Bad"><br>
   Bad<br>
   <b>{$listing.votes_summary.1} votes</b>
  </td>
  <td align=center width=25%>
   <img src="images/r0.gif" alt="Very Bad" title="Very Bad"><br>
   Very Bad<br>
   <b>{$listing.votes_summary.0} votes</b>
  </td>
</tr>
</table>

{if $votes}
<table cellspacing=1 cellpadding=2 border=0 width=100%>
<tr>
  <td align=center class=title>Rating</td>
  <td align=center class=title>User Host</td>
  <td align=center class=title>User E-Mail</td>
  <td align=center class=title>Date</td>
</tr>
{section name=v loop=$votes}
<tr class={if $smarty.section.v.rownum % 2 == 0}detailsbg1{else}detailsbg2{/if}>
  <td align=center>
   {if $votes[v].vote == 0}<img src="images/r0.gif" alt="Very Bad" title="Very Bad">{/if}
   {if $votes[v].vote == 1}<img src="images/r1.gif" alt="Bad" title="Bad">{/if}
   {if $votes[v].vote == 2}<img src="images/r2.gif" alt="Good" title="Good">{/if}
   {if $votes[v].vote == 3}<img src="images/r3.gif" alt="Very Good" title="Very Good">{/if}
  </td>
  <td>{$votes[v].ip}</td>
  <td>{$votes[v].email}</td>
  <td align=center>{$votes[v].fdate}</td>
</tr>
{if $votes[v].comment}
<tr>
  <td>&nbsp;</td>
  <td colspan=3><img src="images/vcom.gif" alt=""> <font color="{if $votes[v].vote == 0}red{/if}{if $votes[v].vote == 1}orange{/if}{if $votes[v].vote == 2}#CBA903{/if}{if $votes[v].vote == 3}green{/if}">{$votes[v].comment}</td>
</tr>
{/if}
{/section}
</table>
{/if}
<br>
<a name="vote"></a>
<form method=post name=vote onsubmit="return procVote()">
<input type="hidden" name="a" value="add_vote">
<input type="hidden" name="action" value="save">
<input type="hidden" name="lid" value="{$listing.id}">
<table cellspacing=0 cellpadding=2 border=0 width=100%>
<tr>
 <td colspan=4 class=title align=center><b>Add your Vote</b></td>
</tr>
<tr>
  <td align=center width=25% height=50><img src="images/r3.gif" alt="Very Good" title="Very Good" /><br>
   <input type="radio" name="vote" value=3>
   Very Good<br>  </td>
  <td align=center width=25%>
   <img src="images/r2.gif" alt="Good" title="Good"><br>
   <input type="radio" name="vote" value=2 checked>
   Good<br>  </td>
  <td align=center width=25%>
   <img src="images/r1.gif" alt="Bad" title="Bad"><br>
   <input type="radio" name="vote" value=1>
   Bad<br>  </td>
  <td align=center width=25%>
   <img src="images/r0.gif" alt="Very Bad" title="Very Bad"><br>
   <input type="radio" name="vote" value=0>
   Very Bad<br>  </td>
</tr>
<tr>
  <td colspan=4>
You can write short comment (max. 255 chars):<br>
<textarea name="comment" class="inpts" cols=90 rows=3></textarea></td>
</tr>
<tr>
  <td colspan=4>
Your e-mail{if $settings.vote_confirmation_require} (we will send you your vote confirmation code){/if}:<br>
<input type="text" name="email" class=inpts size=40>  </td>
</tr>
<tr>
  <td colspan=4><input type="submit" value="Vote" class=sbmt></td>
</tr>
<tr><td colspan=4> <br><br><br>
<a href="index.php?a=details&amp;lid={$listing.id}#vote" > 
<img src="index.php?a=image&amp;lid={$listing.id}" border="0" alt="Monitored by {$settings.site_name}"></a>
</td></tr>
<tr><td colspan=4><strong>To Place Normal Button, Big Button or Right Lower Corner Button above on your site.</strong></a>
<tr><td colspan=4><strong>Please click on box below and copy the code.</strong>
 <tr><td colspan=4> 
<textarea name="logo_txt" wrap="physical" cols="22" rows="10" onmouseover="this.select()"><a href="{$settings.site_url}/?a=details&amp;lid={$listing.id}#vote"><img src="{$settings.site_url}/?a=image&lid={$listing.id}" border="0" alt="Monitored by {$settings.site_name}"></a></textarea>
</td>
 </tr>
<tr><td colspan=4></td></tr>
</table>
</form>
</td></tr></table>
</td></tr></table></div>
{include file="footer.tpl"}