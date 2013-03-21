{include file="header.tpl"}
{literal}
<script>
function checkeditprofileform()
{
var form = document.editprofileform;
if(form.username.value == '') 
{
alert('Enter user name');
form.username.focus();
return false;
}
if(form.email.value == '') 
{
alert('Enter Email');
form.email.focus();
return false;
}
if((form.password.value || form.password2.value ) && form.password.value != form.password2.value) 
{
alert('Passwords do not match');
return false;
}
return true;
}

</script>
{/literal}
<table border="0" cellpadding="0" cellspacing="0" width="100%"  style="border-left:1px #c8c8c8 solid;border-right:1px #c8c8c8 solid;border-bottom:1px #c8c8c8 solid;">
<tbody>

<tr>

          <td style=" width="100%"><table width="629" height="26" border="0" cellpadding="4" cellspacing="0" style="margin:5px;" >

              <tbody>

                <tr bgcolor="#e0e0e0">

                  <td height="29" hlass="td12" bgcolor="#ffffff"  background="images/fon1.jpg" width="960" style="padding-left:5px; font-family:arial; font-size:18px"><div align="center"><strong style="color:#ffffff">User settings</strong></div></td>

                </tr>

              </tbody>

          </table></td>

   

    </tr>

<tr bgcolor="white">
   
    <td colspan="3" style=" padding: 5px;" width="100%">


<script>
<!--
{literal}
var activetab = 'profile_tab';
var tabs = new Array();
tabs['profile'] = '?a=editprofile';
tabs['bookmarks'] = '?a=bookmarks';
tabs['myhyips'] = '?a=myhyips';

function setclass(elemid,classname)
{
   var elem = document.getElementById(elemid);
   elem.className = classname;
}

function loadtab(tab)
{
    if(activetab) setclass(activetab,'');
    activetab = tab + '_tab';
   ajax.load(tabs[tab],'view');
   setclass(tab + '_tab','current');
}

function deletebookmark(lid)
{
ajax.load('?a=bookmarks&action=delete&lid='+lid,'del_'+lid);
}

ajax.setIndicator('images/ajax-loader.gif');
{/literal}
-->
</script>


<ul>
<li id="profile_tab" class="current"><a href="javascript:loadtab('profile')">Profile</a></li>
<!--<li id="bookmarks_tab"><a href="javascript:loadtab('bookmarks')"><img src="images/icon.gif" border=0  /> Bookmarks</a></li>-->
<li id="myhyips_tab"><a href="javascript:loadtab('myhyips')">Edit HYIPs</a></li>
</ul>
</div>
<br />

{if $errors}
{section name=e loop=$errors}
<div style="color: red"><b>{$errors[e]}</b></div>
{/section}
<br />
{/if}
<div id="view">
{include file="editprofile.tpl"}
</div>
</td>
</tr></tbody>
</table>
{include file="footer.tpl"}