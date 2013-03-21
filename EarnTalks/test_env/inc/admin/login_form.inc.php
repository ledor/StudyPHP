<?
/***********************************************************************/
/*                                                                     */
/*  This file is created by deZender                                   */
/*                                                                     */
/*  deZender (Decoder for Zend Encoder/SafeGuard):                     */
/*    Version:      0.9.3.0                                            */
/*    Author:       qinvent.com                                        */
/*    Release on:   2005.11.12                                         */
/*                                                                     */
/***********************************************************************/


  include 'inc/admin/html.header.inc.php';
  echo '  <tr> 
    <td valign="top">
	 <table cellspacing=0 cellpadding=1 border=0 width=100% height=100% bgcolor=#E4CD9C>
	   <tr>
	     <td>
           <table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0">
             <tr bgcolor="#FFFFFF" valign="top"> 
              <td bgcolor="#FFFFFF" valign="top" width=99%>
            <!-- Main: Start -->
            <table width="100%" height="10';
  echo '0%" border="0" cellpadding="10" cellspacing="0" class="forTexts">
              <tr>
                <td width=100% height=100% valign=top align=center>

<form method=post>
<input type=hidden name=a value=do_login>

<table cellspacing=0 cellpadding=2 border=0>
<tr>
 <td colspan=2><b>Authorization:</b><br><br></td>
</tr><tr>
';
  if ($frm['a'] == 'do_login')
  {
    echo ' <td colspan=2><font color=red><b>Invalid Username or Password</b></font></td>
</tr><tr>
';
  }

  echo ' <td>Username:</td>
 <td><input type=text name=username value=\'';
  echo quote ($frm['username']);
  echo '\' class=inpts size=30></td>
</tr><tr>
 <td>Password:</td>
 <td><input type=password name=password value=\'\' class=inpts size=30></td>
</tr><tr>
 <td>&nbsp;</td>
 <td><input type=submit value=\'Login\' class=inpts size=30></td>
</tr></table>
</form>
              </td>
              </tr>
            </table>
            <!-- Main: END -->

              </td>
             </tr>
           </table>
		  </td>
		 </tr>
	   </table';
  echo '>
	 </td>
  </tr>

';
  include 'inc/admin/html.footer.inc.php';
?>
