{include file="header.tpl"}

<h3>Add listing to {$group.name} list</h3>

{literal}
<script>
function validate()
{
  var d = document.add_form;
  if (!d.name.value)
  {
    alert('Please enter your Site Name.');
    d.name.focus();
    return false;
  }
  if (!d.url.value)
  {
    alert('Please enter your Site URL.');
    d.url.focus();
    return false;
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
 //edit by chiang
 var tempd = d.name.value.toLowerCase();
  if (tempd.indexOf('<script')>0 || tempd.indexOf('<iframe')>0)
  {
  	 alert('Valid Site Name!');
	 d.name.focus();
	 return false;
  }
  
 tempd = d.url.value.toLowerCase();
    if (tempd.indexOf('<script')>0 || tempd.indexOf('<iframe')>0)
  {
  	 alert('Valid Site URL!');
	 d.url.focus();
	 return false;
  }
  
   tempd = d.percents.value.toLowerCase();  
   if (tempd.indexOf('<script')>0 || tempd.indexOf('<iframe')>0)
  {
  	 alert('Valid percents!');
	 d.percents.focus();
	 return false;
  }
  
  tempd = d.min_spend.value.toLowerCase(); 
   if (tempd.indexOf('<script')>0 || tempd.indexOf('<iframe')>0)
  {
  	 alert('Valid min_spend!');
	 d.min_spend.focus();
	 return false;
  }
  
  tempd = d.max_spend.value.toLowerCase(); 
   if (tempd.indexOf('<script')>0 || tempd.indexOf('<iframe')>0)
  {
  	 alert('Valid max_spend!');
	 d.max_spend.focus();
	 return false;
  }

tempd = d.referral.value.toLowerCase();
   if (tempd.indexOf('<script')>0 || tempd.indexOf('<iframe')>0)
  {
  	 alert('Valid referral!');
	 d.referral.focus();
	 return false;
  }

tempd = d.description.value.toLowerCase();
   if (tempd.indexOf('<script')>0 || tempd.indexOf('<iframe')>0)
  {
  	 alert('Valid description!');
	 d.description.focus();
	 return false;
  }
  
  //edit by chiang
  return true;
}
</script>
{/literal}

{if $group.add_description}
{$group.add_description}
<br><br>
{/if}

{if $errors}
{section name=e loop=$errors}
{if $errors[e].name == 'name'}
<li style="color: red"> Please enter your Site Name<br>
{/if}
{if $errors[e].name == 'url'}
<li style="color: red"> Please enter your Site URL<br>
{/if}
{if $errors[e].name == 'email'}
<li style="color: red"> Please enter your Contact E-mail<br>
{/if}
{if $errors[e].name == 'invalid_email'}
<li style="color: red"> Please enter valid Contact E-mail<br>
{/if}
{/section}
<br>
{/if}

<form method=post name="add_form" onsubmit="return validate()">
<input type="hidden" name="a" value="add">
<input type="hidden" name="action" value="save">
<input type="hidden" name="type" value="{$frm.type}">
<table cellspacing=1 cellpadding=2 border=0 width=100%>
<tr>
 <td width=30%>* Site Name:</td><td><input type="text" name="name" value="{$frm.name|escape:html}" class=inpts size=50></td>
</tr>
<tr>
 <td>* Site URL:</td><td><input type="text" name="url" value="{$frm.url|escape:html}" class=inpts size=50></td>
</tr>
<tr>
 <td>* Contact E-mail:</td><td><input type="text" name="email" value="{$frm.email|escape:html}" class=inpts size=50></td>
</tr>
<tr>
 <td>Interest Percents:</td><td><input type="text" name="percents" value="{$frm.percents|escape:html}" class=inpts size=50></td>
</tr>
<tr>
 <td>Minimal Spend:</td><td><input type="text" name="min_spend" value="{$frm.min_spend|escape:html}" class=inpts size=50></td>
</tr>
<tr>
 <td>Maximal Spend:</td><td><input type="text" name="max_spend" value="{$frm.max_spend|escape:html}" class=inpts size=50></td>
</tr>
<tr>
 <td>Referral Bonus:</td><td><input type="text" name="referral" value="{$frm.referral|escape:html}" class=inpts size=50></td>
</tr>
<tr>
 <td>Withdrawal Type:</td>
 <td>
   <select name="withdrawal_type" class=inpts>
     <option value=1 {if $frm.withdrawal_type == 1}selected{/if}>Manual</option>
     <option value=2 {if $frm.withdrawal_type == 2}selected{/if}>Instant</option>
     <option value=3 {if $frm.withdrawal_type == 3}selected{/if}>Automatic</option>
   </select>
 </td>
</tr>
<tr>
 <td>Support E-mail:</td><td><input type="text" name="support_email" value="{$frm.support_email|escape:html}" class=inpts size=50></td>
</tr>
<tr>
 <td>Support Form:</td><td><input type="text" name="support_form" value="{$frm.support_form|escape:html}" class=inpts size=50></td>
</tr>
<tr>
 <td>Support Forum:</td><td><input type="text" name="support_forum" value="{$frm.support_forum|escape:html}" class=inpts size=50></td>
</tr>
<tr>
 <td>Support Phone:</td><td><input type="text" name="support_phone" value="{$frm.support_phone|escape:html}" class=inpts size=50></td>
</tr>
<tr>
 <td>Support AIM:</td><td><input type="text" name="support_aim" value="{$frm.support_aim|escape:html}" class=inpts size=50></td>
</tr>
<tr>
  <td valign=top>Payment Methods:</td>
  <td>
{section name=p loop=$payments}
   <input type="checkbox" name="payments[{$payments[p].name}]" value=1 {if $payments[p].selected}checked{/if}>{$payments[p].name} <br>
{/section}
  </td>
</tr>
<tr>
  <td colspan=2>Description</td>
</tr>
<tr>
  <td colspan=2><textarea name="description" cols=82 rows=5 class=inpts>{$frm.description|escape:html}</textarea></td>
</tr>
<tr>
  <td colspan=2>* - required fields</td>
</tr>
<tr>
  <td colspan=2><input type="submit" value="Add" class=sbmt></td>
</tr>
</table>
</form>


{include file="footer.tpl"}
