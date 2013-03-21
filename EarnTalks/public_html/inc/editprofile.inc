<?php

  if(isset($frm['action']) && $frm['action'] == 'save')
   {
    if ($userinfo['email'] != $frm['email']) {
    $q = "update hl_users set email='{$frm[email]}' where user_id = '{$userinfo[user_id]}'";
    ($sth = mysql_query ($q) OR print mysql_error ());
    }

    if($frm['password'] != ''){
    $q = "update hl_users set password=md5('{$frm[password]}') where user_id = '{$userinfo[user_id]}'";
    ($sth = mysql_query ($q) OR print mysql_error ());
    }
      header ('Location: ?a=editprofile&say=changed');
      exit;
}


 $smarty->display('editprofile.tpl');

?>