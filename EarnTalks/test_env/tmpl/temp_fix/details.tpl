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
{if $group.type == 'Autosurf'}
{include file="details_autosurf2.tpl"}
{/if}
{if $group.type == 'Trial'}
{include file="details_trial2.tpl"}
{/if}
{if $group.type == 'GPT'}
{include file="details_gpt2.tpl"}
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
</td></tr>
<tr><td height=26><div class="list_side">
<table width=100% border=0 cellspacing=0 cellpadding=0>
<tr><td><div class="butx1" style="padding-left: 110px"><img src="images/but1.gif" width=6 height=22></div><div class="butx2"><a style="cursor:pointer" onclick="GetData('whois', '{$listing.id}')" class="list_menu">Whois</a></div><div class="butx3"><img src="images/but2.gif" width=6 height=22 /></div><div class="butx1"><img src="images/but1.gif" width=6 height=22 /></div><div class="butx2"><a style="cursor:pointer" onclick="GetData('traffic', '{$listing.id}')" class="list_menu">Traffic Count</a></div><div class="butx3"><img src="images/but2.gif" width=6 height=22 /></div><div class="butx1"><img src="images/but1.gif" width=6 height=22 /></div><div class="butx2"><a style="cursor:pointer" onclick="GetData('paystat', '{$listing.id}')" class="list_menu">Payout Stats</a></div><div class="butx3"><img src="images/but2.gif" width=6 height=22 /></div><div class="butx1"><img src="images/but1.gif" width=6 height=22 /></div><div class="butx2"><a style="cursor:pointer" onclick="GetData('votes', '{$listing.id}')" class="list_menu">Votes</a></div><div class="butx3"><img src="images/but2.gif" width=6 height=22 /></div><div class="butx1"><img src="images/but1.gif" width=6 height=22 /></div><div class="butx2"><a style="cursor:pointer" onclick="GetData('button', '{$listing.id}')" class="list_menu">Monitor Button</a></div><div class="butx3"><img src="images/but2.gif" width=6 height=22></div>
</td></tr>
<tr><td width=100%><div id="data_type"></div>
</td></tr></table></div>
</td></tr></table>
{include file="footer.tpl"}