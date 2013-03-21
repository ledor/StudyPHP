<?php

  $found_records = -1;
if($frm['action'] == 'sendpass')
{
    $found_records = 0;
    $email = quote ($frm['email']);

$sth = mysql_query('select * from hl_users where username=\''.$email.'\' or email=\''.$email.'\'');
	$row = mysql_fetch_array($sth);
	if($row)
	{
        $password = gen_confirm_code (8, 0);
        $enc_password = md5 ($password);
 mysql_query("update hl_users set password='".$enc_password."' where user_id='$row[user_id]'");
	  $smarty->assign('username',$row[username]);
	  $smarty->assign('password',$password);
	  $msg = $smarty->fetch('remindmail.tpl');
	 @mail($row['email'],"Lost password at {$settings[site_url]}",$msg,"From: $settings[system_email]\nContent-type: text/html\n");
      $found_records = 1;
	}
  }

  $smarty->assign ('found_records', $found_records);
  $smarty->display('remindform.tpl');
?>
