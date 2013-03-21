{include file="header.tpl"}

<table border="0" cellpadding="0" cellspacing="0" width="100%" >

<tbody>



<tr bgcolor="#ffffff">

   

    <td style=" border-left:1px #c8c8c8 solid;border-right:1px #c8c8c8 solid;"  width="100%"><table style="margin:5px;">
              <tbody>

                <tr bgcolor="#ffffff">

                  <td height="29" hlass="td12" bgcolor="#ffffff"  background="images/fon1.jpg" width="960" style="padding-left:5px; font-family:arial; font-size:18px"><div align="center"><strong style="color:#ffffff">Login Error</strong></div></td>

                </tr>

              </tbody>

          </table>



         </td>

</tr>

<tr bgcolor="white">

<td colspan="3" style=" border-left:1px #c8c8c8 solid;border-right:1px #c8c8c8 solid;border-bottom:1px #c8c8c8 solid; padding: 5px; font-family:tahoma; font-size:11px;" width="100%">

{if $errors}

<ul>

{section name=e loop=$errors}

<li style="color:red; font-weight: bold;">

{if $errors[e].name == 'name'}Wrong user name{/if}

{if $errors[e].name == 'password'}Wrong password{/if}

</li>

{/section}

</ul>

{/if}

</td>

</tr></tbody>

</table>

{include file="footer.tpl"}