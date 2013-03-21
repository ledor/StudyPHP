<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>{$settings.site_name}</title>
<link href="style.css" rel="stylesheet" type="text/css">
</head>

<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" >
<center>
<table cellspacing=0 cellpadding=2 border=0 width=100%>
<tr>
 <th class=title>{$settings.site_name}</th>
</tr>
</table>
<table cellspacing=1 cellpadding=2 border=0 width=100%>
<tr>
 <td colspan=4 class=detailsbg1>Payout Statistics for <b>{$listing.name}</b></td>
</tr>
<tr>
 <td colspan=4 class=detailsbg2>
  {if $listing.hyip_status == 1}<img src="images/m_pay.gif" border=0 alt="Paying" title="Paying" align=absmiddle>{/if}
  {if $listing.hyip_status == 2}<img src="images/m_wait.gif" border=0 alt="Waiting" title="Waiting" align=absmiddle>{/if}
  {if $listing.hyip_status == 3}<img src="images/m_prob.gif" border=0 alt="Problem" title="Problem" align=absmiddle>{/if}
  {if $listing.hyip_status == 4}<img src="images/m_npay.gif" border=0 alt="Not Paying" title="Not Paying" align=absmiddle>{/if}
 </td>
</tr>
<tr>
 <td colspan=4 class=detailsbg1>Payouts Ratio: <b>{$ratio} {if $ratio > 1}<font color=red>in profit</font>{/if}</b></td>
</tr>
<tr>
 <td colspan=4 class=detailsbg1>Payouts Found: <b>{$payouts}</b></td>
</tr>
</table>

<table cellspacing=1 cellpadding=2 border=0 width=100%>
<tr>
 <th class=title>Date</th>
 <th class=title>Amount</th>
 <th class=title>Comment</th>
</tr>
{if $stats}
{section name=s loop=$stats}
<tr class={if $smarty.section.s.rownum % 2 != 0}detailsbg1{else}detailsbg2{/if}>
 <td>{$stats[s].fdate}</td>
 <td>${$stats[s].amount}</td>
 <td align=center>{$stats[s].comment}</td>
</tr>
{/section}
{else}
<tr>
 <td colspan=4 align=center>No Payouts.</td>
</tr>
{/if}
</table>
</center></body>
</html>
