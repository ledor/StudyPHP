<?

if ($frm['action'] == 'checkpayment')
{
	$lid = sprintf ('%d', $frm['lid']);
	$email = $frm['email'];
	$amount = $frm['lr_amnt'];
    $batch = $frm['lr_transfer'];
    $account = $frm['lr_paidby'];
	
	$q = 'update hl_listings set status = 1 where id = ' . $lid;
      if (!($sth = mysql_query ($q)))
      {
        exit (mysql_error ());        
      }
	
	
  $q = 'select * from hl_emails where id = \'listing_approve\'';
  $sth = mysql_query ($q);
  $msg = mysql_fetch_array ($sth);
  $text = $msg['text'];
  $subject = $msg['subject'];
  
  
  $q = 'select * from hl_listings where id = '.$lid;
  $sth = mysql_query ($q);
  $row = mysql_fetch_array ($sth);
  
  reset ($row);
  
  foreach ($row as $k => $v)
  {
    if (is_array ($v))
    {
      continue;
    }

    $v = strip_tags ($v);
    $v = preg_replace ('' . '/(\\$)/', '\\\\$', $v);
    $text = preg_replace ('' . '/#' . $k . '#/', '' . $v, $text);
    $subject = preg_replace ('' . '/#' . $k . '#/', '' . $v, $subject);
  }
  
  $text = preg_replace ('/#site_name#/', $settings['site_name'], $text);
  $subject = preg_replace ('/#site_name#/', $settings['site_name'], $subject);
  $text = preg_replace ('/#site_url#/', $settings['site_url'], $text);
  $subject = preg_replace ('/#site_url#/', $settings['site_url'], $subject);
  $text = preg_replace ('/#id#/',$lid,$text);
  
  $text = 'Congratulations! 
  You have successfully transfered $'.$amount.' from LR account #'.$account.' to our LR account which batch is #'.$batch.'!
  
  '.$text;  
  
  $text2 = 'Congratulations!
  New Listing '.$row['name'].' just paid $'.$amount.' from LR account #'.$account.' to our LR account which batch is #'.$batch.'!
  
  You can EDIT this site infomation at :
  
 '.$settings['site_url'].'/admin.php?a=edit_listing&lid='.$lid;
 
 
  
    mail ($settings['admin_email'], $settings['site_name'] . ' paid successful', $text2);
	mail ($email,$subject,$text);
	
    header ('Location: ?a=lr_processing&say=success&amount='.$amount.'&account='.$account.'&email='.$email.'&batch='.$batch.'&lid='.$lid);
	
    exit ();
}

  $smarty->assign ('lid',$frm['lid']);
  $smarty->assign ('email',$frm['email']);
  $smarty->assign ('amount',$frm['amount']);
  $smarty->assign ('account',$frm['account']);
  $smarty->assign ('batch',$frm['batch']);
  $smarty->assign ('say', $frm['say']);
  $smarty->display ('lr_processing.tpl');
?>
