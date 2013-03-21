<?php

if($frm['action'] == 'register') {
	$errors = array();
	$sth = mysql_query("select username from hl_users where username='{$frm[username]}'");
	$n = mysql_num_rows($sth);

	if($n > 0) { array_push($errors,'name'); }
	else
	{ 
           $sth = mysql_query("select email from hl_users where email='{$frm[email]}'");
	   $n = mysql_num_rows($sth);
           if($n > 0) { array_push($errors,'email'); }
        }


	if($errors)
	{
		$smarty->assign('errors',$errors);
		$smarty->assign('frm',$frm);
		$smarty->display('regform.tpl');
                exit;
	}
	else
	{
          mysql_query("insert into hl_users set 
                                               username='{$frm[username]}', 
                                               email='{$frm[email]}', 
                                               password='".md5($frm[password])."'");
		$smarty->assign('username',$frm['username']);
		$smarty->assign('password',$frm['password']);
		$msg = $smarty->fetch('regnotify.tpl');
		//unset($_SESSION['register']);
		@mail($frm['email'],"Registration at {$settings[site_name]}",$msg,"From: $settings[system_email]\nContent-type: text/html; charset=\"windows-1251\"\n");
		$smarty->display('regconfirm.tpl');
                exit();
	}
}

$smarty->display("regform.tpl");
?>