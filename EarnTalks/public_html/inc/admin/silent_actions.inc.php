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


 

  if ($frm['a'] == 'maillist')
  {
    if ($frm['action'] == 'download')
    {
      if ($settings['demomode'] == 1)
      {
        header ('Location: ?a=maillist');
        exit ();
      }

      $csv = 'EMAIL,IP
';
      $q = 'select * from hl_maillist';
      $sth = mysql_query ($q);
      while ($row = mysql_fetch_array ($sth))
      {
        $csv .= $row['email'] . ',' . $row['ip'] . '
';
      }

      header ('Accept-Ranges: bytes');
      header ('Content-Length: ' . strlen ($csv));
      header ('Connection: close');
      header ('Content-Disposition: attachment; filename="maillist' . date ('Ymdhi') . '.csv"');
      header ('Content-type: application/comma-separated-values');
      print $csv;
      exit ();
    }
  }

  if ($frm['a'] == 'adsmanagement')
  {
    if ($settings['demomode'] != 1)
    {
      if ($frm['action'] == 'up')
      {
        $id = intval ($frm['id']);
        $q = '' . 'select ordering from hl_ads where id = ' . $id;
        ($sth = mysql_query ($q) OR print mysql_error ());
        $row = mysql_fetch_array ($sth);
        if ($row)
        {
          $q = 'update hl_ads set ordering = ordering + 1 where ordering = ' . ($row['ordering'] - 1);
          (mysql_query ($q) OR print mysql_error ());
          $q = '' . 'update hl_ads set ordering = ordering - 1 where id = ' . $id;
          (mysql_query ($q) OR print mysql_error ());
        }

        header ('Location: ?a=adsmanagement');
        exit ();
      }

      if ($frm['action'] == 'down')
      {
        $id = intval ($frm['id']);
        $q = '' . 'select ordering from hl_ads where id = ' . $id;
        ($sth = mysql_query ($q) OR print mysql_error ());
        $row = mysql_fetch_array ($sth);
        if ($row)
        {
          $q = 'update hl_ads set ordering = ordering - 1 where ordering = ' . ($row['ordering'] + 1);
          (mysql_query ($q) OR print mysql_error ());
          $q = '' . 'update hl_ads set ordering = ordering + 1 where id = ' . $id;
          (mysql_query ($q) OR print mysql_error ());
        }

        header ('Location: ?a=adsmanagement');
        exit ();
      }

      if ($frm['action'] == 'add')
      {
//minibanner
        if ($frm['textorminibanner']=='minibanner')
		{	
			/*
			list($width, $height, $type, $attr)=getimagesize($frm['text']);
			if ($width>140)
			{
			$height=floor($height*140/$width);
			$width=140;
			}
			$frm['text']='<div align=center><a href="'.$frm['url'].'" target=_blank><img src="'.$frm['text'].'" border=0 alt="'.$frm['title'].'" width="'.$width.'" height="'.$height.'"></a></div>';
			$frm_orig['text']='<div align=center><a href="'.$frm['url'].'" target=_blank><img src="'.$frm_orig['text'].'" border=0 alt="'.$frm['title'].'"  width="'.$width.'" height="'.$height.'"></a></div>';

			*/
			
			$frm['text']='<div align=center><a href="'.$frm['url'].'" target=_blank><img src="'.$frm['text'].'" border=0 alt="'.$frm['title'].'"></a></div>';
			$frm_orig['text']='<div align=center><a href="'.$frm['url'].'" target=_blank><img src="'.$frm_orig['text'].'" border=0 alt="'.$frm['title'].'"></a></div>';
		}
//minibanner
			  
		$title = quote ($frm['title']);
        $date = join ('-', array (intval ($frm['year']), intval ($frm['month']), intval ($frm['day'])));
        $expiration = intval ($frm['expiration']);
        $url = quote ($frm['url']);
        if ($settings['demomode'] == 1)
        {
          $text = quote ($frm['text']);
        }
        else
        {
          $text = quote ($frm_orig['text']);
        }
		
        $q = 'update hl_ads set ordering = ordering + 1';
        (mysql_query ($q) OR print mysql_error ());
        $q = '' . 'insert into hl_ads set ordering = 0, date=\'' . $date . '\', title=\'' . $title . '\', text=\'' . $text . '\', url=\'' . $url . '\', expiration = \'' . $expiration . '\'';
        (mysql_query ($q) OR print mysql_error ());
        header ('Location: ?a=adsmanagement');
        exit ();
      }

      if (($frm['action'] == 'edit' AND $frm['save'] == 1))
      {
        $id = intval ($frm['id']);
        $title = quote ($frm['title']);
        $date = join ('-', array (intval ($frm['year']), intval ($frm['month']), intval ($frm['day'])));
        $expiration = intval ($frm['expiration']);
        $url = quote ($frm['url']);
        if ($settings['demomode'] == 1)
        {
          $text = quote ($frm['text']);
        }
        else
        {
          $text = quote ($frm_orig['text']);
        }

        $q = '' . 'update hl_ads set date = \'' . $date . '\', title=\'' . $title . '\', text=\'' . $text . '\', url=\'' . $url . '\', expiration = \'' . $expiration . '\' where id = ' . $id;
        (mysql_query ($q) OR print mysql_error ());
        $frm['action'] = '';
        header ('Location: ?a=adsmanagement');
        exit ();
      }

      if ($frm['action'] == 'delete')
      {
        $id = intval ($frm['id']);
        $q = '' . 'select ordering from hl_ads where id = ' . $id;
        ($sth = mysql_query ($q) OR print mysql_error ());
        $row = mysql_fetch_array ($sth);
        if ($row)
        {
          $q = 'update hl_ads set ordering = ordering - 1 where ordering > ' . $row['ordering'];
          (mysql_query ($q) OR print mysql_error ());
        }

        $q = '' . 'delete from hl_ads where id = ' . $id;
        (mysql_query ($q) OR print mysql_error ());
        header ('Location: ?a=adsmanagement');
        exit ();
      }
    }
  }




/*editrcb*/
 if ($frm['a'] == 'edit_rcb')
  {
{
    $frm['lid'] = intval ($frm['lid']);
      if ($frm['action'] == 'add')
         {
         for ($i = 1; $i <= 10; $i++)
          {
            $q = 'insert into hl_rcbrate set textid='.$i.',type="LD",used=1,program_id='.$frm['lid'];
            mysql_query ($q);
          }
         header ('Location: ?a=rcbview&lid='.$frm['lid']);
         }


      if ($frm['action'] == 'set_as_onhold')
        {
        $q = 'update hl_rcbrate set onhold=1 where program_id='.$frm['lid'];
        mysql_query ($q);
        header ('Location: ?a=rcbview&lid='.$frm['lid']);
        }

      if ($frm['action'] == 'set_as_used')
        {
        $q = 'update hl_rcbrate set onhold=0 where program_id='.$frm['lid'];
        mysql_query ($q);
        header ('Location: ?a=rcbview&lid='.$frm['lid']);
        }

      if ($frm['action'] == 'update')
         {
         for ($i = 1; $i <= 10; $i++)
          {
            $Tai=$frm['Ta'][$i];
            $Tbi=$frm['Tb'][$i];
            $Tci=$frm['Tc'][$i];
            $Tdi=$frm['Td'][$i];
            $Tei=$frm['Te'][$i];
            $Tfi=$frm['Tf'][$i];
            $Tgi=$frm['Tg'][$i];
            $Tri=$frm['Tr'][$i];
            $q = 'update hl_rcbrate set deposit='. $Tai .',depositfrom='.$Tdi.',depositto='.$Tei.',rcb='.$Tbi.',bonus='.$Tci.',rcb2='.$Tfi.',bonus2='.$Tgi.',ref='.$Tri.' where textid='.$i.' and program_id='.$frm['lid'];        
            if (!($sth = mysql_query ($q)))
             {
              exit (mysql_error ());
             }
          }
          header ('Location: ?a=rcbview&lid='.$frm['lid']);
         }
       if ($frm['action'] == 'delete')
        {
         $q = 'delete from hl_rcbrate where program_id='.$frm['lid'];
         mysql_query ($q);
         header ('Location: ?a=listings');
        }
  }
}


/*rcbview*/
if ($frm['a'] == 'rcbview')
  {
{
    if ($frm['action'] == 'delete')
    {
     
      $ids = intval ($frm['lid']);
      $q = 'delete from hl_rcbreport where id = ' . $ids;
      if (!($sth = mysql_query ($q)))
      {
        exit (mysql_error ());
        ;
      }
   header ('Location: ?a=rcbview&paidunpaid='.$frm['paidunpaid']);
    }


if ($frm['action'] == 'processed')
     {

	$id = sprintf ('%d', $frm['id']);

        $q = 'update hl_rcbreport set status = "Paid" where id='.$id;
        $sth = mysql_query ($q);
        $q = 'select A.*,B.name from hl_rcbreport as A,hl_listings as B where A.lid=B.id and A.id='.$id;
        $sth = mysql_query ($q);
        $row = mysql_fetch_array ($sth);  
        $email = $row['email'];
        $program = $row['name'];
        $rcb = $row['rcb'];
        $text = 'Hello Sir' . "\r\n";
        $text .= 'Your RCB Requst For '.$program.' Was Paid  ' . $settings['site_url'].' .' . "\r\n";
        $text .= 'Please check it out.' . "\r\n";
        $text .=  'We wish you have a prosperous future with this high risk area.' . "\r\n";
        $text .=  'We highly recommend you NOT to spend what you cant afford to lose.' . "\r\n";
        $text .= 'Thank you for joining under us.' . '';
        
     
        mail($email, "RCB processed from {$settings[site_name]}", $text, '' . 'From:'.$settings['admin_email']);
   header ('Location: ?a=rcbview&paidunpaid='.$frm['paidunpaid']);    
 
     }


     
    if ($frm['action'] == 'update')
     {

	$id = sprintf ('%d', $frm['id']);
        $batch = $frm['lr_transfer'];
        $q = 'update hl_rcbreport set status = "Paid.Batch='.$batch.'" where id='.$id;
        $sth = mysql_query ($q);
        $q = 'select A.*,B.name from hl_rcbreport as A,hl_listings as B where A.lid=B.id and A.id='.$id;
        $sth = mysql_query ($q);
        $row = mysql_fetch_array ($sth);  
        $email = $row['email'];
        $program = $row['name'];
        $rcb = $row['rcb'];
        $text = 'Your RCB Requst For '.$name.' Was Paid. The Batch No. Is '.$batch;
        mail($email, "RCB Paid", $text);
    
 
     }
}

  }


  if ($frm['a'] == 'settings')
  {
    if (($frm['action'] == 'save' AND $settings['demomode'] != 1))
    {
      $settings['site_name'] = $frm['site_name'];
      $settings['site_url'] = $frm['site_url'];
      $settings['site_url_alt'] = $frm['site_url_alt'];
      $settings['system_email'] = $frm['system_email'];
      $settings['admin_login'] = $frm['admin_login'];
      $settings['admin_password'] = $frm['admin_password'];
      $settings['admin_email'] = $frm['admin_email'];
      $settings['admin_lr_account'] = $frm['admin_lr_account'];
      $settings['admin_ym_account'] = $frm['admin_ym_account'];
      $settings['ecurrency'] = $frm['ecurrency'];
      $settings['alexa'] = $frm['alexa'];
      $settings['listing_confirmation_require'] = intval ($frm['listing_confirmation_require']);
      $settings['notify_about_addition'] = intval ($frm['notify_about_addition']);
      $settings['vote_confirmation_require'] = intval ($frm['vote_confirmation_require']);
      $settings['new_for_days'] = intval ($frm['new_for_days']);
      $settings['new_page_for_days'] = intval ($frm['new_page_for_days']);
      $settings['traffic_count_days'] = intval ($frm['traffic_count_days']);
      $settings['payments'] = $frm['payments'];
      $settings['last_news_count'] = $frm['last_news_count'];
      $settings['image_bg_color'] = $frm['image_bg_color'];
      $settings['image_name_bg_color'] = $frm['image_name_bg_color'];
      $settings['image_text_color'] = $frm['image_text_color'];
	  
	  $settings['premiummonitorfees'] = $frm['premiummonitorfees'];
	  $settings['premiumlistingfees'] = $frm['premiumlistingfees'];
	  $settings['normalmonitorfees'] = $frm['normalmonitorfees'];
	  $settings['normallistingfees'] = $frm['normallistingfees'];
	  $settings['autosurfmonitorfees'] = $frm['autosurfmonitorfees'];
	  $settings['autosurflistingfees'] = $frm['autosurflistingfees'];
	  $settings['trialmonitorfees'] = $frm['trialmonitorfees'];
	  $settings['triallistingfees'] = $frm['triallistingfees'];
	  
      save_settings ();
      header ('Location: ?a=settings');
      exit ();
    }
  }
  
  if ($frm['a'] == 'sections')
  {
    if (($frm['action'] == 'save' AND $settings['demomode'] != 1))
    {
      $settings['textads_box'] = intval ($frm['textads_box']);
      $settings['subscribe_box'] = intval ($frm['subscribe_box']);
      $settings['logo_box'] = intval ($frm['logo_box']);
      $settings['newlistings_box'] = intval ($frm['newlistings_box']);
      $settings['paysystems_box'] = intval ($frm['paysystems_box']);
      $settings['partners_box'] = intval ($frm['partners_box']);
      $settings['news_box'] = intval ($frm['news_box']);
      save_settings ();
      header ('Location: ?a=sections');
      exit ();
    }
  }

  if ($frm['a'] == 'delete_votes')
  {
    $frm['lid'] = intval ($frm['lid']);
    $delete = join (',', array_keys ($frm['delete']));
    if ($delete)
    {
      $delete = ',' . $delete;
    }

    $q = '' . 'delete from hl_votes where id in (-1 ' . $delete . ')';
    if (!($sth = mysql_query ($q)))
    {
      exit (mysql_error ());
      ;
    }

    header ('Location: ?a=edit_votes&lid=' . $frm['lid']);
    exit ();
  }

  if ($frm['a'] == 'delete_trunsactions')
  {
    if ($frm['delete'])
    {
      $frm['lid'] = intval ($frm['lid']);
      $delete = join (',', array_keys ($frm['delete']));
      if ($delete)
      {
        $delete = ',' . $delete;
      }

      $q = '' . 'delete from hl_statistics where id in (-1 ' . $delete . ')';
      if (!($sth = mysql_query ($q)))
      {
        exit (mysql_error ());
        ;
      }
    }

    header ('Location: ?a=edit_statistics&lid=' . $frm['lid']);
    exit ();
  }

  if ($frm['a'] == 'add_trunsaction')
  {
    if ($settings['demomode'] == 1)
    {
      $frm_orig['comment'] = $frm['comment'];
    }

    $date = join ('-', array (intval ($frm['year']), intval ($frm['month']), intval ($frm['day'])));
    $inserts = array ();
    array_push ($inserts, 'listing_id = \'' . intval ($frm['lid']) . '\'');
    array_push ($inserts, 'type = \'' . intval ($frm['type']) . '\'');
    array_push ($inserts, 'amount = \'' . sprintf ('%.2f', $frm['amount']) . '\'');
    array_push ($inserts, '' . 'date = \'' . $date . '\'');
    array_push ($inserts, 'comment = \'' . quote ($frm_orig['comment']) . '\'');
    array_push ($inserts, 'batch = \'' . quote ($frm['batch']) . '\'');
    $q = 'insert into hl_statistics set ' . join (',', $inserts);
    if (!($sth = mysql_query ($q)))
    {
      exit (mysql_error ());
      ;
    }

    header ('Location: ?a=edit_statistics&lid=' . $frm['lid']);
    exit ();
  }

  if ($frm['a'] == 'approve_listing')
  {
    if ($frm['action'] == 'save')
    {
      $frm['lid'] = intval ($frm['lid']);
      $frm['date_added'] = join ('-', array (intval ($frm['year']), intval ($frm['month']), intval ($frm['day'])));
      $frm['date_closed'] = join ('-', array (sprintf ('%04d', $frm['cyear']), intval ($frm['cmonth']), intval ($frm['cday'])));
      $inserts = array ();
      if ($settings['demomode'] == 1)
      {
        $frm_orig['name'] = $frm['name'];
        $frm_orig['percents'] = $frm['percents'];
        $frm_orig['min_spend'] = $frm['min_spend'];
        $frm_orig['max_spend'] = $frm['max_spend'];
        $frm_orig['referral'] = $frm['referral'];
        $frm_orig['description'] = $frm['description'];
      }

      array_push ($inserts, 'name = \'' . quote ($frm_orig['name']) . '\'');
      array_push ($inserts, 'group_id = \'' . intval ($frm['group_id']) . '\'');
      array_push ($inserts, 'rating = \'' . intval ($frm['rating']) . '\'');
      array_push ($inserts, 'hyip_status = \'' . intval ($frm['hyip_status']) . '\'');
      array_push ($inserts, 'status = \'' . intval ($frm['status']) . '\'');
      array_push ($inserts, 'url = \'' . quote ($frm['url']) . '\'');
      array_push ($inserts, 'percents = \'' . quote ($frm_orig['percents']) . '\'');
      array_push ($inserts, 'min_spend = \'' . quote ($frm_orig['min_spend']) . '\'');
      array_push ($inserts, 'max_spend = \'' . quote ($frm_orig['max_spend']) . '\'');
      array_push ($inserts, 'referral = \'' . quote ($frm_orig['referral']) . '\'');
      array_push ($inserts, 'withdrawal_type = \'' . intval ($frm['withdrawal_type']) . '\'');
      array_push ($inserts, 'email = \'' . quote ($frm['email']) . '\'');
      array_push ($inserts, 'support_email = \'' . quote ($frm['support_email']) . '\'');
      array_push ($inserts, 'support_form = \'' . quote ($frm['support_form']) . '\'');
      array_push ($inserts, 'support_forum = \'' . quote ($frm['support_forum']) . '\'');
      array_push ($inserts, 'support_phone = \'' . quote ($frm['support_phone']) . '\'');
      array_push ($inserts, 'support_aim = \'' . quote ($frm['support_aim']) . '\'');
      array_push ($inserts, 'date_added = \'' . quote ($frm['date_added']) . '\'');
      array_push ($inserts, 'date_closed = \'' . quote ($frm['date_closed']) . '\'');
      array_push ($inserts, 'expiration = \'' . abs (intval ($frm['expiration'])) . '\'');
      $paysystems = '';
      if (is_array ($frm['payments']))
      {
        $paysystems = join (',', array_keys ($frm['payments']));
      }

      array_push ($inserts, 'pay_systems = \'' . quote ($paysystems) . '\'');
      array_push ($inserts, 'description = \'' . quote ($frm_orig['description']) . '\'');
      array_push ($inserts, 'account = \'' . quote ($frm['account']) . '\'');
      array_push ($inserts, 'date_updated = now()');
      $q = 'update hl_listings set ' . join (',', $inserts) . ' where id = ' . $frm['lid'];
      if (!($sth = mysql_query ($q)))
      {
        exit (mysql_error ());
        ;
      }

      $frm['text'] = preg_replace ('/\\r/', '', $frm['text']);
      if ($frm['send_notification'])
      {
        mail ($frm['to'], $frm['subject'], $frm_orig['text'], 'From: ' . $frm['from'] . '
Reply-To: ' . $frm['from']);
      }

      if (!$frm['return'])
      {
        $frm['return'] = 'listings';
      }

      header ('Location: ?a=' . $frm['return'] . '&gid=' . $frm['gid'] . '&p=' . $frm['p']);
      exit ();
    }
  }

  if ($frm['a'] == 'decline_listing')
  {
    if ($frm['action'] == 'save')
    {
      $frm['lid'] = intval ($frm['lid']);
      $q = 'delete from hl_listings where id = ' . $frm['lid'];
      if (!($sth = mysql_query ($q)))
      {
        exit (mysql_error ());
        ;
      }

      $q = 'delete from hl_votes where listing_id = ' . $frm['lid'];
      if (!($sth = mysql_query ($q)))
      {
        exit (mysql_error ());
        ;
      }

      $q = 'delete from hl_statistics where listing_id = ' . $frm['lid'];
      if (!($sth = mysql_query ($q)))
      {
        exit (mysql_error ());
        ;
      }

      $q = 'delete from hl_traffic where listing_id = ' . $frm['lid'];
      if (!($sth = mysql_query ($q)))
      {
        exit (mysql_error ());
        ;
      }

      $q = 'delete from hl_in_log where listing_id = ' . $frm['lid'];
      if (!($sth = mysql_query ($q)))
      {
        exit (mysql_error ());
        ;
      }

      $frm['text'] = preg_replace ('/
/', '', $frm['text']);
      if ($frm['send_notification'])
      {
        mail ($frm['to'], $frm['subject'], $frm['text'], 'From: ' . $frm['from'] . '
Reply-To: ' . $frm['from']);
      }

      if (!$frm['return'])
      {
        $frm['return'] = 'listings';
      }

      header ('Location: ?a=' . $frm['return'] . '&gid=' . $frm['gid'] . '&p=' . $frm['p']);
      exit ();
    }
  }

  if ($frm['a'] == 'add_listing')
  {
    if ($frm['action'] == 'save')
    {
      $frm['date_added'] = join ('-', array (intval ($frm['year']), intval ($frm['month']), intval ($frm['day'])));
      $frm['date_closed'] = join ('-', array (sprintf ('%04d', $frm['cyear']), intval ($frm['cmonth']), intval ($frm['cday'])));
      $accounts = preg_split ('/\\s*,\\s*/', $frm['account']);
      $frm['account'] = '|' . join ('|', $accounts) . '|';
      if ($settings['demomode'] == 1)
      {
        $frm_orig['name'] = $frm['name'];
        $frm_orig['percents'] = $frm['percents'];
        $frm_orig['min_spend'] = $frm['min_spend'];
        $frm_orig['max_spend'] = $frm['max_spend'];
        $frm_orig['referral'] = $frm['referral'];
        $frm_orig['description'] = $frm['description'];
      }

      $inserts = array ();
      array_push ($inserts, 'name = \'' . quote ($frm_orig['name']) . '\'');
      array_push ($inserts, 'group_id = \'' . intval ($frm['group_id']) . '\'');
      array_push ($inserts, 'rating = \'' . intval ($frm['rating']) . '\'');
      array_push ($inserts, 'hyip_status = \'' . intval ($frm['hyip_status']) . '\'');
      array_push ($inserts, 'status = \'' . intval ($frm['status']) . '\'');
      array_push ($inserts, 'url = \'' . quote ($frm['url']) . '\'');
      array_push ($inserts, 'percents = \'' . quote ($frm_orig['percents']) . '\'');
      array_push ($inserts, 'min_spend = \'' . quote ($frm_orig['min_spend']) . '\'');
      array_push ($inserts, 'max_spend = \'' . quote ($frm_orig['max_spend']) . '\'');
      array_push ($inserts, 'referral = \'' . quote ($frm_orig['referral']) . '\'');
      array_push ($inserts, 'withdrawal_type = \'' . intval ($frm['withdrawal_type']) . '\'');
      array_push ($inserts, 'email = \'' . quote ($frm['email']) . '\'');
      array_push ($inserts, 'support_email = \'' . quote ($frm['support_email']) . '\'');
      array_push ($inserts, 'support_form = \'' . quote ($frm['support_form']) . '\'');
      array_push ($inserts, 'support_forum = \'' . quote ($frm['support_forum']) . '\'');
      array_push ($inserts, 'support_phone = \'' . quote ($frm['support_phone']) . '\'');
      array_push ($inserts, 'support_aim = \'' . quote ($frm['support_aim']) . '\'');
      array_push ($inserts, 'date_added = \'' . quote ($frm['date_added']) . '\'');
      array_push ($inserts, 'date_closed = \'' . quote ($frm['date_closed']) . '\'');
      array_push ($inserts, 'expiration = \'' . abs (intval ($frm['expiration'])) . '\'');
      $paysystems = '';
      if (is_array ($frm['payments']))
      {
        $paysystems = join (',', array_keys ($frm['payments']));
      }

      array_push ($inserts, 'pay_systems = \'' . quote ($paysystems) . '\'');
      array_push ($inserts, 'account = \'' . quote ($frm['account']) . '\'');
      array_push ($inserts, 'description = \'' . quote ($frm_orig['description']) . '\'');
      array_push ($inserts, 'date_updated = now()');
      $q = 'insert into hl_listings set ' . join (',', $inserts);
      if (!($sth = mysql_query ($q)))
      {
        exit (mysql_error ());
        ;
      }

      $listing_id = mysql_insert_id ();
      header ('Location: ?a=listings&gid=' . $frm['gid'] . '&p=' . $frm['p']);
      exit ();
    }
  }

  if ($frm['a'] == 'edit_listing')
  {
    if ($frm['action'] == 'save')
    {

      $frm['lid'] = intval ($frm['lid']);
      $frm['date_added'] = join ('-', array (intval ($frm['year']), intval ($frm['month']), intval ($frm['day'])));
      $frm['date_closed'] = join ('-', array (sprintf ('%04d', $frm['cyear']), intval ($frm['cmonth']), intval ($frm['cday'])));
      $accounts = preg_split ('/\\s*,\\s*/', $frm['account']);
      $frm['account'] = '|' . join ('|', $accounts) . '|';
      if ($settings['demomode'] == 1)
      {
        $frm_orig['name'] = $frm['name'];
        $frm_orig['percents'] = $frm['percents'];
        $frm_orig['min_spend'] = $frm['min_spend'];
        $frm_orig['max_spend'] = $frm['max_spend'];
        $frm_orig['referral'] = $frm['referral'];
        $frm_orig['description'] = $frm['description'];
      }

      $inserts = array ();
      array_push ($inserts, 'name = \'' . quote ($frm_orig['name']) . '\'');
      array_push ($inserts, 'group_id = \'' . intval ($frm['group_id']) . '\'');
      array_push ($inserts, 'rating = \'' . intval ($frm['rating']) . '\'');
      array_push ($inserts, 'hyip_status = \'' . intval ($frm['hyip_status']) . '\'');
      array_push ($inserts, 'status = \'' . intval ($frm['status']) . '\'');
      array_push ($inserts, 'url = \'' . quote ($frm['url']) . '\'');
      array_push ($inserts, 'percents = \'' . quote ($frm_orig['percents']) . '\'');
      array_push ($inserts, 'min_spend = \'' . quote ($frm_orig['min_spend']) . '\'');
      array_push ($inserts, 'max_spend = \'' . quote ($frm_orig['max_spend']) . '\'');
      array_push ($inserts, 'referral = \'' . quote ($frm_orig['referral']) . '\'');
      array_push ($inserts, 'withdrawal_type = \'' . intval ($frm['withdrawal_type']) . '\'');
      array_push ($inserts, 'email = \'' . quote ($frm['email']) . '\'');
      array_push ($inserts, 'support_email = \'' . quote ($frm['support_email']) . '\'');
      array_push ($inserts, 'support_form = \'' . quote ($frm['support_form']) . '\'');
      array_push ($inserts, 'support_forum = \'' . quote ($frm['support_forum']) . '\'');
      array_push ($inserts, 'support_phone = \'' . quote ($frm['support_phone']) . '\'');
      array_push ($inserts, 'support_aim = \'' . quote ($frm['support_aim']) . '\'');
      array_push ($inserts, 'date_added = \'' . quote ($frm['date_added']) . '\'');
      array_push ($inserts, 'date_closed = \'' . quote ($frm['date_closed']) . '\'');
      array_push ($inserts, 'expiration = \'' . abs (intval ($frm['expiration'])) . '\'');
      $paysystems = '';
      if (is_array ($frm['payments']))
      {
        $paysystems = join (',', array_keys ($frm['payments']));
      }

      array_push ($inserts, 'pay_systems = \'' . quote ($paysystems) . '\'');
      array_push ($inserts, 'description = \'' . quote ($frm_orig['description']) . '\'');
      array_push ($inserts, 'account = \'' . quote ($frm['account']) . '\'');
      array_push ($inserts, 'date_updated = now()');
      $q = 'update hl_listings set ' . join (',', $inserts) . ' where id = ' . $frm['lid'];
      if (!($sth = mysql_query ($q)))
      {
        exit (mysql_error ());
        ;
      }

      if (!$frm['return'])
      {
        $frm['return'] = 'listings';
      }

      header ('Location: ?a=' . $frm['return'] . '&gid=' . $frm['gid'] . '&p=' . $frm['p']);
      exit ();
    }
  }

  if ($frm['a'] == 'delete_listing')
  {
    $frm['lid'] = intval ($frm['lid']);
    $q = 'delete from hl_listings where id = ' . $frm['lid'];
    if (!($sth = mysql_query ($q)))
    {
      exit (mysql_error ());
      ;
    }

    $q = 'delete from hl_votes where listing_id = ' . $frm['lid'];
    if (!($sth = mysql_query ($q)))
    {
      exit (mysql_error ());
      ;
    }

    $q = 'delete from hl_statistics where listing_id = ' . $frm['lid'];
    if (!($sth = mysql_query ($q)))
    {
      exit (mysql_error ());
      ;
    }

    $q = 'delete from hl_traffic where listing_id = ' . $frm['lid'];
    if (!($sth = mysql_query ($q)))
    {
      exit (mysql_error ());
      ;
    }

    $q = 'delete from hl_rcbrate where program_id = ' . $frm['lid'];
    if (!($sth = mysql_query ($q)))
    {
      exit ();
      ;
    }

    $q = 'delete from hl_rcbreport where lid = ' . $frm['lid'];
    if (!($sth = mysql_query ($q)))
    {
      exit ();
      ;
    }



    $q = 'delete from hl_in_log where listing_id = ' . $frm['lid'];
    if (!($sth = mysql_query ($q)))
    {
      exit (mysql_error ());
      ;
    }

    if (!$frm['return'])
    {
      $frm['return'] = 'listings';
    }

    header ('Location: ?a=' . $frm['return'] . '&gid=' . $frm['gid'] . '&p=' . $frm['p']);
    exit ();
  }

  if ($frm['a'] == 'edit_group')
  {
    if ($frm['action'] == 'save')
    {
      if ($settings['demomode'] == 1)
      {
        $frm_orig['name'] = $frm['name'];
        $frm_orig['nav_name'] = $frm['nav_name'];
        $frm_orig['add_description'] = $frm['add_description'];
      }

      $frm['id'] = intval ($frm['id']);
      $q_name = quote ($frm_orig['name']);
      $q_nav_name = quote ($frm_orig['nav_name']);
      $q_add_description = quote ($frm_orig['add_description']);
      $q_sort = quote ($frm['sort']);
      $q_reg_enabled = intval ($frm['reg_enabled']);
      $q_expiration = intval ($frm['expiration']);
      $q = '' . 'update hl_groups set name = \'' . $q_name . '\', nav_name = \'' . $q_nav_name . '\', add_description = \'' . $q_add_description . '\', sort = \'' . $q_sort . '\', reg_enabled = \'' . $q_reg_enabled . '\', expiration = \'' . $q_expiration . '\' where id = ' . $frm['id'];
      if (!($sth = mysql_query ($q)))
      {
        exit (mysql_error ());
        ;
      }

      header ('Location: ?a=groups');
      exit ();
    }
  }

  if ($frm['a'] == 'update_groups')
  {
    $q = 'update hl_groups set status = 0, onindex = 0, onnew = 0';
    if (!($sth = mysql_query ($q)))
    {
      exit (mysql_error ());
      ;
    }

    if ($frm['status'])
    {
      $statuses = join (',', array_keys ($frm['status']));
      $q = '' . 'update hl_groups set status = 1 where id in (' . $statuses . ')';
      if (!($sth = mysql_query ($q)))
      {
        exit (mysql_error ());
        ;
      }
    }

    if ($frm['onindex'])
    {
      $statuses = join (',', array_keys ($frm['onindex']));
      $q = '' . 'update hl_groups set onindex = 1 where id in (' . $statuses . ')';
      if (!($sth = mysql_query ($q)))
      {
        exit (mysql_error ());
        ;
      }
    }

    if ($frm['onnew'])
    {
      $statuses = join (',', array_keys ($frm['onnew']));
      $q = '' . 'update hl_groups set onnew = 1 where id in (' . $statuses . ')';
      if (!($sth = mysql_query ($q)))
      {
        exit (mysql_error ());
        ;
      }
    }

    header ('Location: ?a=groups');
    exit ();
  }

?>
