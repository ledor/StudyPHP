{literal}
<script>
function validate()
{
  var d = document.rcb_form;

  if (!d.username.value)
  {
    alert('Please enter your user name.');
    d.username.focus();
    return false;
  }
  if (!d.ecno.value)
  {
    alert('Please enter your E-Currency No.');
    d.ecno.focus();
    return false;
  }
  if (!d.deposit.value)
  {
    alert('Please enter your deposit.');
    d.deposit.focus();
    return false;
  }


  if (isNaN(d.deposit.value))
   {
    alert('Please enter Number only.');
    d.deposit.select();
     return   false;
   }   

  if (!d.email.value)
  {
    alert('Please, enter your E-Mail address!');
    d.email.focus();
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

 var tempd = d.username.value.toLowerCase();
  if (tempd.indexOf('<script')>0 || tempd.indexOf('<iframe')>0)
  {
  	 alert('Valid User Name!');
	 d.username.focus();
	 return false;
  }
  
 tempd = d.deposit.value.toLowerCase();
    if (tempd.indexOf('<script')>0 || tempd.indexOf('<iframe')>0)
  {
  	 alert('Valid Deposit!');
	 d.deposit.focus();
	 return false;
  }
  
   tempd = d.ecno.value.toLowerCase();  
   if (tempd.indexOf('<script')>0 || tempd.indexOf('<iframe')>0)
  {
  	 alert('Valid E-Currency No!');
	 d.ecno.focus();
	 return false;
  }
  
  
}
</script>
{/literal}


<table cellspacing=0 cellpadding=0 border=0 width=100% class="listbody">  
<tr>
 <td> RCB For <b>{$listing.name}</b></td>
</tr>

<tr>
<td>

<table cellspacing=0 cellpadding=0 border=1 width=100% class="listbody" style="border-color: #F7FFE0">
<tr bgcolor="#eeeeee">
<td width=25% align="center" rowspan="2" bordercolor="#000000">Deposit</td>
<td width=15% align="center" rowspan="2" bordercolor="#000000">REF</td>
<td width="30%" align="center" colspan="2" bordercolor="#000000">
1st Deposit</td>
<td width="30%" align="center" colspan="2" bordercolor="#000000">
Re-Invested</td>

</tr>




<tr bgcolor="#eeeeee">
<td width=15% align="center" bordercolor="#000000">
RCB</td>
<td width=15% align="center" bordercolor="#000000">
BONUS</td>
<td width=15% align="center" bordercolor="#000000">
RCB</td>
<td width=15% align="center" bordercolor="#000000">
BONUS</td>

</tr>


{section name=l loop=$r_info}


{if $r_info[l].type=='LD'}
{if $r_info[l].depositfrom>0}
<tr bgcolor="#FFFFFF">
<td align="center">${$r_info[l].depositfrom}-${$r_info[l].depositto}</td>
<td align="center">{if $r_info[l].rcb>0} {$r_info[l].ref}% {else} --- {/if}</td>
<td align="center">{if $r_info[l].rcb>0} {$r_info[l].rcb}% {else} --- {/if}</td>
<td align="center">{if $r_info[l].bonus>0} ${$r_info[l].bonus} {else} --- {/if}</td>
<td align="center">{if $r_info[l].rcb2>0} {$r_info[l].rcb2}% {else} --- {/if}</td>
<td align="center">{if $r_info[l].bonus2>0} ${$r_info[l].bonus2} {else} --- {/if}</td>

</tr>

{/if}
{/if}

{/section}

<tr>
<td colspan=6> 
<br><b>RCB Guidelines:</b><br>
<font color="#990000"><br>&nbsp;&nbsp;1. You should request RCB in 24 hours after deposited, Or your request will be canceled.
<br>&nbsp;&nbsp;2. You can't deposit with one pay processor and request RCB payment from another.<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Except for GPT Sites which I prefer to pay in PP.
<br>&nbsp;&nbsp;3. Min. payout for Alertpay is $1, that is Alertpay rules.
<br>&nbsp;&nbsp;4. The RCB payment will be processed within 72 hours after confirmed.
<br>&nbsp;&nbsp;5. If your RCB payment request had been "Declined" , it means that you are not my<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;referral or you reinvest from account balance or the program turn to "scam".<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;If you still have any question, please feel free to contact with us.
<br>&nbsp;&nbsp;6. RCB for GPT sites are to be paid every weekends. Please request RCB until<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Friday everyweek. If not requested on time, it will be processed on the following weekend.<br></font>
<br>Please fill in the form and submit to us. We will process it Asap.</td>
</tr>

<tr>
<td colspan=6>


<form method=post name="rcb_form" onsubmit="return validate()">
<input type="hidden" name="a" value="rcb">
<input type="hidden" name="action" value="submited">
<input type="hidden" name="lid" value="{$listing.id}">
<input type="hidden" name="program" value="{$listing.name}">
<input type="hidden" name="rcbrate" value="{$listing.rcb}">
<input type="hidden" name="refrate" value="{$listing.refrate}">
<table cellspacing=1 cellpadding=2 border=0 width=100%>
<br>
<tr>
 <td >* Your User Name:</td><td><input type="text" name="username" value="{$frm.name|escape:html}" class=inpts size=25></td>
</tr>
<tr>
 <td>* Your Deposited:</td><td><input type="text" name="deposit" value="1" class=inpts size=25 {if $group.type=='GPT'}disabled="disabled"{/if}></td>
</tr>

<tr>
 <td>* Contact E-mail:</td><td><input type="text" name="email" value="{$frm.email|escape:html}" class=inpts size=25></td>
</tr>
<tr>
<tr>
<td >* E-Currency: </td>
<td >
<input type='radio' name='ec' value='LR' checked>LR
<input type='radio' name='ec' value='PM' >PM
<input type='radio' name='ec' value='AP' >AP
<input type='radio' name='ec' value='PP' >PP


</td>
</tr>

<tr>
 <td >* E-Currency No.:</td><td><input type="text" name="ecno" value="{$frm.ecno|escape:html}" class=inpts size=25></td>
</tr>


<tr>
  <td colspan=2>* - All required fields</td>
</tr>
<tr>
  <td colspan=2><input type="submit" value="Request Now &gt;&gt;" class=sbmt></td>
</tr>
</table>
</form>

</td></tr>

</table>

</td></tr>

</table>

