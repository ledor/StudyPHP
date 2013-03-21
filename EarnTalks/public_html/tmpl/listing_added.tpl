{include file="header.tpl"}

<table cellspacing=1 cellpadding=2 border=0 width=100%>
<tr>
 <td align=center>
   <p><strong>Thank you for using our system.<br>
     Your listing has been successfully added!</strong>
     </p>
   <p align="left">Please make the payment for your new program listing using the form below. Your   program listing will be reviewed and approved <U><strong>ONLY</strong></U> after we have receive   your payment.</p>
   <p><table cellspacing="0" cellpadding="2" border="0" width="100%">
	
<tr><td align="center"><strong>Your Site Name: <font color="red">{$name}</strong></font></td></tr>
<tr><td align="center"><strong>Deposit Amount:
<font color="red">${$fee}</font>&nbsp;&nbsp;(any deposit below our minimum will not be refunded)</strong></td></tr><tr><td></td><br>
<br>

<!--LR Pay start-->
<tr><td align="center">
<form name="LR_spend" method="POST" action="https://sci.libertyreserve.com">
<input type="hidden" name="lr_acc" value="{$settings.admin_lr_account}">
<input type="hidden" name="lr_store" >
<input type="hidden" name="lr_amnt" value="{$fee}">
<input type="hidden" name="lr_currency" value="LRUSD">
<input type="hidden" name="lr_comments" value="Fees-{$email}/{$name}/{$ip}">
<input type="hidden" name="lr_success_url" value="{$settings.site_url}/?a=lr_processing&say=success">
<input type="hidden" name="lr_success_url_method" value="POST">
<input type="hidden" name="lr_fail_url" value="{$settings.site_url}/?a=advertise">
<input type="hidden" name="lr_fail_url_method" value="POST">
<input type="hidden" name="lr_status_url" value="{$settings.site_url}/?a=lr_processing">
<input type="hidden" name="lr_status_url_method" value="POST">
  
<input type=hidden name=lid value="{$lid}">
<input type=hidden name=email value={$email}">
<input type=hidden name=action value="checkpayment">

<tr><td align="center">
<font color=#FF0000><font size=7><b><input name="LibertyReserve" src="images/paywithLR.gif" onclick="submit" border="0"  type="image"></b></font></font></form></td></tr><!--LR Pay end--></table></p>
<table width="80%" border="0" cellspacing="0" cellpadding="0">
  <tr>
 <tr><td align="center">
</td></tr>
<form action=https://perfectmoney.com/api/step1.asp method="POST">
  <input type="hidden" name="PAYEE_ACCOUNT" value="{$settings.admin_pm_account}">
    <input type="hidden" name="PAYEE_NAME" value="{$settings.admin_pm_name}">
  <input type="hidden" name="PAYMENT_UNITS" value="USD">
  <input type="hidden" name="SUGGESTED_MEMO" value="Fees-{$email}/{$name}/{$ip}">
  <input type="hidden" name="PAYMENT_URL_METHOD" value="POST">
  <input type="hidden" name="PAYMENT_AMOUNT" value="{$fee}">
  <input type="hidden" name="PAYMENT_URL" value="{$settings.site_url}/?a=lr_processing&say=success">
  <input type="hidden" name="NOPAYMENT_URL_METHOD" value="POST">
  <input type="hidden" name="NOPAYMENT_URL" value="{$settings.site_url}/?a=advertise">
  <input type="hidden" name="STATUS_URL" value="{$settings.site_url}/?a=support">
  <input type="hidden" name="BAGGAGE_FIELDS" value="Fees-{$email}/{$name}/{$ip}">
  <tr><td align="center"><br>

<font color=#FF0000><font size=7><b><input name="PerfectMoney" src="images/perfect_money.gif" onclick="submit" border="0"  type="image"></b></font></font></td></tr></form></td></tr></td></tr>
 <table width="80%" border="0" cellspacing="0" cellpadding="0">
   <p>
   <table width="100%" border="0" align="center" cellpadding="0" cellspacing="1" class="adblack">
     <tr class=title2>
       <td align="center" bgcolor="#CC0000"><font color="#FFFFFF"><strong>
		Listing Location</strong></font></td>
       <td align="center" bgcolor="#CC0000"><font color="#FFFFFF"><strong>Total 
		Fees = Monitor Fees + Listing Fees</strong></font></td>
       <td align="center" bgcolor="#CC0000"><font color="#FFFFFF"><strong>Add 
		Your Program now! </strong>
		</font></td>
     </tr>

     <tr class="adlight">
       <td align="left" bgcolor="#F3F3F3">Premium Listing</td>
       <td align="left" bgcolor="#F3F3F3">${$settings.premiummonitorfees+$settings.premiumlistingfees}<font color="#FF0000">(${$settings.premiummonitorfees}+${$settings.premiumlistingfees})*</font></td>
       <td align="left" bgcolor="#F3F3F3"><a href="index.php?a=add&amp;type=1">Add to the 
		Premium listing </a></td>
     </tr>
     <tr class="adlight">
       <td align="left">Normal Listing </td>
       <td align="left">${$settings.normalmonitorfees+$settings.normallistingfees}<font color="#FF0000">(${$settings.normalmonitorfees}+${$settings.normallistingfees})*</font></td>
       <td align="left"><a href="index.php?a=add&amp;type=2">Add to the Normal listing</a></td>
     </tr>
     <tr class="adlight">
       <td align="left" bgcolor="#F3F3F3"> Autosurf Listing </td>
       <td align="left" bgcolor="#F3F3F3">${$settings.autosurfmonitorfees+$settings.autosurflistingfees}<font color="#FF0000">(${$settings.autosurfmonitorfees}+${$settings.autosurflistingfees})*</font></td>
       <td align="left" bgcolor="#F3F3F3"><a href="index.php?a=add&amp;type=2">Add to the 
		Autosurf listing</a></td>
     </tr>
     <tr class="adlight">
       <td align="left">Trial Listing </td>
       <td align="left">${$settings.trialmonitorfees+$settings.triallistingfees}<font color="#FF0000">(${$settings.trialmonitorfees}+${$settings.triallistingfees})*</font></td>
       <td align="left"><a href="index.php?a=add&amp;type=3">Add to the Trial listing</a></td>
     </tr>
     <tr class="adlight">
     <tr class="adptc">
       <td align="left">PTC Listing </td>
       <td align="left">${$settings.trialmonitorfees+$settings.triallistingfees}<font color="#FF0000">(${$settings.trialmonitorfees}+${$settings.triallistingfees})*</font></td>
       <td align="left"><a href="index.php?a=add&amp;type=5">Add to the PTC listing</a></td>
     </tr>
       <td colspan="5">

 <font color="#FF0000"><br />
      	*</font><font color="#FF0000">${$settings.premiummonitorfees}</font>will 
		be reinvested into your program for the monitoring.<font color="#FF0000">${$settings.premiumlistingfees} 
		fee.</font> <strong>If the minimum deposit of your program is higher 
		than ${$settings.premiummonitorfees+$settings.premiumlistingfees}you have to spend the minimum amount.</strong><br />
      <br />
      <font color="#FF0000">**</font><font color="#FF0000">${$settings.normalmonitorfees}</font> 
		will be reinvested into your program for the monitoring.<font color="#FF0000">${$settings.normallistingfees} 
		fee.</font> <strong>If the minimum deposit of your program is higher 
		than ${$settings.normalmonitorfees+$settings.normallistingfees} you have to spend the minimum amount.</strong>After 
		we get 80% of our deposit we will consider your listing advancement to 
		the 'Premium' section.<br />
      <br />
      <font color="#FF0000">***${$settings.autosurfmonitorfees}</font> will be 
		reinvested into your program for the monitoring.<font color="#FF0000">${$settings.autosurflistingfees} 
		fee</font>. <strong>If the minimum deposit of your program is higher 
		than ${$settings.autosurfmonitorfees+$settings.autosurflistingfees} you have to spend the minimum amount.</strong><font color="#FF0000"><br />
      <br />
      	****${$settings.trialmonitorfees}</font> will be reinvested into your 
		program for the monitoring.<font color="#FF0000">${$settings.triallistingfees} 
		fee.</font> <strong>If the minimum deposit of your program is higher 
		than ${$settings.trialmonitorfees+$settings.triallistingfees} you have to spend the minimum amount.</strong>After 
		we get 80% of our deposit we will consider your listing advancement to 
		the 'Normal' section.<br />
       <br />
      	<font color="#FF0000">****${$settings.ptcmonitorfees}</font> will be reinvested into your 
		program for the monitoring.<font color="#FF0000">${$settings.ptclistingfees} 
		fee.</font> <strong>If the minimum deposit of your program is higher 
		than ${$settings.ptcmonitorfees+$settings.ptclistingfees} you have to spend the minimum amount.</strong><br />
      <br /></td>
     </tr>
   </table>
   <br>
     </p></td>
</tr>
</table>

{include file="footer.tpl"}
