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


  function notify_about_addition ($row)
  {
    global $settings;
    $row['withdrawal_type'] = ($row['withdrawal_type'] == 1 ? 'Manual' : ($row['withdrawal_type'] == 2 ? 'Instant' : 'Automatic'));
    send_mail ('listing_added', $settings['admin_email'], $settings['system_email'], $row);
  }

  if ($frm['display'] == 'added')
  {
  	$smarty->assign ('lid',$frm['lid']);
    $smarty->assign ('name',$frm['name']);
    $smarty->assign ('fee',$frm['fee']);
	$smarty->assign ('ip',$_SERVER['REMOTE_ADDR']);
    $smarty->assign ('email',$frm['email']);
    $smarty->display ('listing_added.tpl');
    exit ();
  }

  if ($frm['display'] == 'confirm')
  {
    $smarty->display ('listing_confirm.tpl');
    exit ();
  }

  if ($frm['action'] == 'confirm')
  {
    $success = 0;
    if ($frm['code'])
    {
      $q = 'select * from hl_listings where confirm = \'' . quote ($frm['code']) . '\' limit 0, 1';
      $sth = mysql_query ($q);
      $row = mysql_fetch_array ($sth);
      if ($row['id'])
      {
        $q = 'update hl_listings set confirm = \'0\' where confirm = \'' . quote ($frm['code']) . '\'';
        $sth = mysql_query ($q);
        $success = 1;
        if ($settings['notify_about_addition'])
        {
          $q = 'select * from hl_groups where id = ' . $row['group_id'];
          ($sth = mysql_query ($q) OR print mysql_error ());
          $group = mysql_fetch_array ($sth);
          $row['group'] = $group['name'];
          notify_about_addition ($row);
        }
      }
    }

    $smarty->assign ('success', $success);
    $smarty->display ('listing_confirmed.tpl');
    exit ();
  }

  $groups = array ();
  $frm['type'] = intval ($frm['type']);
  $q = 'select * from hl_groups where status = 1 and reg_enabled = 1 and id = ' . $frm['type'];
  ($sth = mysql_query ($q) OR print mysql_error ());
  $group = mysql_fetch_array ($sth);
  if (!$group)
  {
    header ('Location: ?a=advertise');
    exit ();
  }

  $smarty->assign ('group', $group);
  $payments = preg_split ('/\\s*,\\s*/', $settings['payments']);
  $errors = array ();
  if ($frm['action'] == 'save')
  {
    if (!$frm['name'])
    {
      array_push ($errors, array ('name' => 'name'));
    }

    if (!$frm['url'])
    {
      array_push ($errors, array ('name' => 'url'));
    }

    if (!$frm['email'])
    {
      array_push ($errors, array ('name' => 'email'));
    }
    else
    {
      if (!preg_match ('/^[^\\@]+\\@[^\\@]+\\.\\w{2,4}$/', $frm['email']))
      {
        array_push ($errors, array ('name' => 'invalid_email'));
      }
    }

    if (!$errors)
    {
      $inserts = array ();
      array_push ($inserts, 'name = \'' . quote ($frm['name']) . '\'');
      array_push ($inserts, 'group_id = \'' . intval ($frm['type']) . '\'');
      array_push ($inserts, 'status = \'2\'');
      array_push ($inserts, 'hyip_status = \'2\'');
      array_push ($inserts, 'url = \'' . quote ($frm['url']) . '\'');
      array_push ($inserts, 'percents = \'' . quote ($frm['percents']) . '\'');
      array_push ($inserts, 'min_spend = \'' . quote ($frm['min_spend']) . '\'');
      array_push ($inserts, 'max_spend = \'' . quote ($frm['max_spend']) . '\'');
      array_push ($inserts, 'referral = \'' . quote ($frm['referral']) . '\'');
      array_push ($inserts, 'withdrawal_type = \'' . intval ($frm['withdrawal_type']) . '\'');
      array_push ($inserts, 'email = \'' . quote ($frm['email']) . '\'');
      array_push ($inserts, 'support_email = \'' . quote ($frm['support_email']) . '\'');
      array_push ($inserts, 'support_form = \'' . quote ($frm['support_form']) . '\'');
      array_push ($inserts, 'support_forum = \'' . quote ($frm['support_forum']) . '\'');
      array_push ($inserts, 'support_phone = \'' . quote ($frm['support_phone']) . '\'');
      array_push ($inserts, 'support_aim = \'' . quote ($frm['support_aim']) . '\'');
      array_push ($inserts, 'date_added = now()');
      array_push ($inserts, 'date_closed = \'0000-00-00\'');
      array_push ($inserts, 'expiration = \'' . abs (intval ($group['expiration'])) . '\'');
      $add_payments = array ();
      if ($frm['payments'])
      {
        foreach (array_keys ($frm['payments']) as $paysystem)
        {
          if (in_array ($paysystem, $payments))
          {
            array_push ($add_payments, $paysystem);
            continue;
          }
        }
      }

      $frm['pay_systems'] = join (',', $add_payments);
      array_push ($inserts, 'pay_systems = \'' . quote ($frm['pay_systems']) . '\'');
      array_push ($inserts, 'description = \'' . quote ($frm['description']) . '\'');
      array_push ($inserts, 'date_updated = now()');
      $confirm_code = gen_confirm_code (10);
      if ($settings['listing_confirmation_require'])
      {
        array_push ($inserts, 'confirm = \'' . $confirm_code . '\'');
      }

      $q = 'insert into hl_listings set ' . join (',', $inserts);
      if (!($sth = mysql_query ($q)))
      {
        exit (mysql_error ());
        ;
      }

      if ($settings['listing_confirmation_require'])
      {
        $info = array ();
        $info['confirm_code'] = $confirm_code;
        $info['listing_name'] = $frm['name'];
        send_mail ('listing_confirm', $frm['email'], $settings['system_email'], $info);
        header ('Location: ?a=add&display=confirm');
      }
      else
      {
        if ($settings['notify_about_addition'])
        {
          $frm['date_added'] = date ('Y-m-d h:i:s');
          $frm['group'] = $group['name'];
          notify_about_addition ($frm);
        }
		
	//find max ID and 
	$q = 'SELECT max(`id`) as id  FROM `hl_listings`';
	if (!($sth = mysql_query ($q)))
      {
        exit (mysql_error ());
        ;
      }
		
	$listing = mysql_fetch_array ($sth);	
	
	//autopay
	
	$fee=$settings[strtolower ($group['type']).'monitorfees']+$settings[strtolower ($group['type']).'listingfees'];
	if ($fee<1) {$fee=0.1;}
	
        header ('Location: ?a=add&display=added&name='.$frm['name'].'&fee='.$fee.'&email='.$frm['email'].'&ip='.$_SERVER['REMOTE_ADDR'].'&lid='.$listing['id']);
		
		//autopay 
		
      }

      exit ();
    }
  }

  $paysystems = array ();
  $selected = $frm['payments'];
  if (!$selected)
  {
    $selected = array ();
  }

  foreach ($payments as $payment)
  {
    array_push ($paysystems, array ('name' => $payment, 'selected' => in_array ($payment, array_keys ($selected))));
  }

  $smarty->assign ('payments', $paysystems);
  $smarty->assign ('errors', $errors);
  $smarty->display ('add_' . strtolower ($group['type']) . '.tpl');
?>
