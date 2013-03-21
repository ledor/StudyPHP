<?php

if(isset($frm['action']) && $frm['action'] == 'saveprofile') {

 $q = "update hl_users set email='{$frm[email]}' where user_id='{$frm[id]}'";
 ($sth = mysql_query ($q) OR print mysql_error ());
 if($frm['password'] != '') {
 $q = "update hl_users set password=md5('{$frm[password]}') where user_id='{$frm[id]}'";
 ($sth = mysql_query ($q) OR print mysql_error ());
		}
	}


$smarty->display('accmain.tpl');

?>