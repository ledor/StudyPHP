{include file="header.tpl"}



{if $say eq 'send'}
<h3 align=left>Support Form:</h3>
<p align=left>
Message has been successfully sent. We will back to you in next 24 hours. Thank you.<br><br>
</p>

{else}
{if $say eq 'pay'}
<h3>Pay Now!</h3>
Your AD Request has been successfully sent.<br />
You can Pay Your AD Fee Now!<br />
<br />
<table width="80%" border="0" cellspacing="0" cellpadding="0">
  <tr>
  <td align="center"><b>You Have to Pay :<font color="#ff0000">${$fee} </font>. Please choose Payment Type</b></td>
<!--LR Pay start-->
<tr><td align="center">
</td></tr>
<form action="https://sci.libertyreserve.com" 
method="post">
<input type="hidden" value="{$fee}" name="lr_amnt" >
<input type="hidden" value="{$settings.admin_lr_account}" name="lr_acc" />
<input type="hidden" name="lr_store" />
<input type="hidden" name="lr_currency" value="LRUSD" />
<input type="hidden" name="lr_comments" value="AD From:{$ip}/{$email}"/>
<input type="hidden" name="lr_fail_url" value="{$settings.site_url}/?a=lr_processing&say=notsuccess"/>
<input type="hidden" name="lr_fail_url_method" value="POST"/>
<input type="hidden" name="lr_success_url" value="{$settings.site_url}/?a=lr_processing&say=success"/>
<input type="hidden" name="lr_success_url_method" value="POST"/>
<input type="hidden" name="lr_status_url" value="{$settings.site_url}"/>
<input type="hidden" name="email" value="{$email}"/>
<input type="hidden" name="action" value="LR_checkpayment"/>

<tr><td align="center"><br>
<font color=#FF0000><font size=7><b><input name="LibertyReserve" src="images/paywithLR.gif" onclick="submit" border="0"  type="image"></b></font></font></td></tr></form></td></tr></td></tr>
 <!-- LR pay end-->
 <table width="80%" border="0" cellspacing="0" cellpadding="0">
  <tr>
 <tr><td align="center">
</td></tr>
<form action=https://perfectmoney.com/api/step1.asp method="POST">
  <input type="hidden" name="PAYEE_ACCOUNT" value="{$settings.admin_pm_account}">
    <input type="hidden" name="PAYEE_NAME" value="{$settings.admin_pm_name}">
  <input type="hidden" name="PAYMENT_UNITS" value="USD">
  <input type="hidden" name="SUGGESTED_MEMO" value="AD From:{$ip}/{$email}">
  <input type="hidden" name="PAYMENT_URL_METHOD" value="POST">
  <input type="hidden" name="PAYMENT_AMOUNT" value="{$fee}">
  <input type="hidden" name="PAYMENT_URL" value="{$settings.site_url}/?a=lr_processing&say=success">
  <input type="hidden" name="NOPAYMENT_URL_METHOD" value="POST">
  <input type="hidden" name="NOPAYMENT_URL" value="{$settings.site_url}/?a=lr_processing&say=notsuccess">
  <input type="hidden" name="STATUS_URL" value="{$settings.site_url}/?a=support">
  <input type="hidden" name="BAGGAGE_FIELDS" value="AD From:{$ip}/{$email}">
  <tr><td align="center"><br>

<font color=#FF0000><font size=7><b><input name="PerfectMoney" src="images/perfect_money.gif" onclick="submit" border="0"  type="image"></b></font></font></td></tr></form></td></tr></td></tr>
 <table width="80%" border="0" cellspacing="0" cellpadding="0">
  <tr>
</table>
{else}
<h3 align=left>Support Form:</h3>
<script language=javascript>
{literal}
function checkform() {
  if (document.mainform.name.value == '') {
    alert("Please type your full name!");
    document.mainform.name.focus();
    return false;
  }
  if (document.mainform.email.value == '') {
    alert("Please enter your e-mail address!");
    document.mainform.email.focus();
    return false;
  }
  if (document.mainform.message.value == '') {
    alert("Please type your message!");
    document.mainform.message.focus();
    return false;
  }
  return true;
}
{/literal}
</script>

<form method=post name=mainform onsubmit="return checkform()">
<input type=hidden name=a value=support>
<input type=hidden name=action value=send>

<table align=left cellspacing=0 cellpadding=2 border=0>
<tr align=left>
 <td>Your Name:</td>
 <td><input type="text" name="name" size=30 class=inpts></td>
</tr>
<tr align=left>
 <td>Your Email:</td>
 <td><input type="text" name="email" size=30 class=inpts></td>
</tr>
<tr align=left>
 <td colspan=2>Message:<br><br><textarea name=message class=inpts cols=45 rows=4></textarea>
</tr>
<tr align=left>
 <td>&nbsp;</td>
 <td><input type=submit value="Send" class=sbmt></td>
</tr></table>
</form>

{/if}
{/if}


{include file="footer.tpl"}
