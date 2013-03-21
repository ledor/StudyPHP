<?

  if ($frm['action'] == 'send')
  {
    $from = $frm['eml'];
    $message = $settings['site_name'] . ' SCAM Report from ' . date ('l dS of F Y h:i:s A') . '

---------------------------------------------------------------
';
    $message .= $frm['notify'];
    $message .= '

---------------------------------------------------------------
';
    $message .= 'User Additional Info :';
    $message .= 'Program Name : ' . $frm['hyip_name'] . '';
    $message .= 'Program URL    : ' . $frm['hyip_url'] . '';
    $message .= 'User IP : ' . $_SERVER['REMOTE_ADDR'] . '';
    $message .= 'Language  : ' . $_SERVER['HTTP_ACCEPT_LANGUAGE'] . '';
    @mail ($settings['admin_email'], $settings['site_name'].' SCAM Report', $message, 'From: '.$from);
    header ('Location: ?a=report_scam&say=send&lid='.$frm['lid']);
    exit ();
  }

  $frm['lid'] = intval ($frm['lid']);
  $q = 'select * from hl_listings where id = '.$frm['lid'];
  if (!($sth = mysql_query ($q)))
  {
    exit;
  }

  $listing = mysql_fetch_array ($sth);
  if (!$listing)
  {
    exit;
  }

  
  $smarty->assign ('listing', $listing);
  $smarty->assign ('email',$frm['email']);
  $smarty->assign ('say', $frm['say']);
  $smarty->display ('report_scam.tpl');
?>

