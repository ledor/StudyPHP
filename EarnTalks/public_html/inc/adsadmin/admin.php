<?

require_once('../config/config.php');
require_once('../config/func.php');

$a=auth();
if ($a===false)
	header('Location: index.php');



  
  
/*begin */



  
require_once('adsfunc.php');  
  
 
 
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title><?php echo PageTitle ?> - Administration</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="../config/style.css" rel="stylesheet" type="text/css">
</head>
<body>
<table align="center" style="width:780px" cellspacing="0" cellpadding="0">
		<!-- TOP LOGO + MENU -->
		<tr>
			<td height="201" width="136" background="../gfx/top_menubg1.gif">&nbsp;		</td>			
           <td  height="201" width="645"><img src="../gfx/top_1.gif" width="645" height="201"></td>
		</tr>
	
		<tr>
		<td width="780"  height="26" align="center" valign="top" background="../gfx/top_menubg2.gif" colspan="2">&nbsp;			</td>
		</tr>		
		<tr height="24">
		  <td align="center" colspan="2" background="../gfx/top_menubg3.gif"><strong>:: ADS Managemant  ::</strong></td>			
		</tr>
		</table>

		<!-- END TOP LOGO + MENU -->
		
 <table align="center" style="width:780px" cellspacing="0" cellpadding="0">
  <tr>
        <td valign="bottom" width=19 background="../gfx/left-bg.gif"><img height=19 src="../gfx/left-bg_1.gif" width=19></td> <!-- left-bg-->
		
    <td><br />
<br />

<table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="140" align="center" valign="top" bgcolor="#D6B485"><br />
          <table width="100%" border="0" cellpadding="0" cellspacing="1"  style="background-color:#a88966">
      <tr>
        <td align="center" bgcolor="#D6B485"><a href="?a=specialbanners">Special Banners </a></td>
      </tr>
      <tr>
        <td align="center" bgcolor="#D6B485"><a href="?a=normalbanners">Normal Banners </a></td>
      </tr>
      <tr>
        <td align="center" bgcolor="#D6B485"><a href="?a=minibanners">Text ADS or Mini Banners </a></td>
      </tr>
      <tr>
        <td align="center" bgcolor="#D6B485"><a href="./index.php?logout=1"><strong>Logout</strong></a></td>
      </tr>
    </table></td>
    <td valign="top"><?
	switch ($frm['a'])
	{
	case 'specialbanners':
		include 'edit_special.php';
		break;
		
	case 'normalbanners':
		include 'edit_normal.php';
		break;
		
	case 'minibanners':
		include 'edit_mini.php';
		break;
	
	default:
		echo "Please secect! ";
	}
	
	?></td>
  </tr>
</table>

<br />
<br />
<table align="center" style="width:742px" cellSpacing=0 cellPadding=0  border=0>
<tr>       
    <td width=90><img height=89  src="../gfx/foot-1.gif" width=90></td>      
    <td align="center" bgcolor="#D3B286" style="letter-spacing:2px" font color="#5B1E02"> 
        <font color="#5B1E02">&copy;Copyright 2011 by <strong>EarnTalks.com</strong> 
        - all rights reserved </font>    
	</td>		
   <td width=90><img height=89  src="../gfx/foot-2.gif"  width=90></td>
</tr>
<tr> 
      <td><img height=19 src="../gfx/foot-3.gif" width=90></td>
      <td><img height=19 src="../gfx/foot-4.gif" width=562></td>
      <td><img height=19 src="../gfx/foot-5.gif" width=90></td>
</tr>
	
</table>

<!-- END  copyright-->
</td>
<td valign="bottom" width=19 background="../gfx/right-bg.gif"><img height=19 src="../gfx/right-bg_1.gif" width=19></td>  <!-- Right-bg-->	
</tr></table>	  
