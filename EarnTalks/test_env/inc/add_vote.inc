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


  if ($frm['action'] == 'confirm')
  {
    $success = 0;
    if ($frm['code'])
    {
      $q = 'select * from hl_votes where confirm = \'' . quote ($frm['code']) . '\' limit 0, 1';
      $sth = mysql_query ($q);
      $row = mysql_fetch_array ($sth);
      if ($row['listing_id'])
      {
        $qupdates = 0;
        $qt = 'select id from hl_votes where confirm = \'0\' and email = \'' . quote ($row['email']) . '\' and listing_id = ' . $row['listing_id'];
        $stht = mysql_query ($qt);
        while ($rowt = mysql_fetch_array ($stht))
        {
          $inserts = array ();
          array_push ($inserts, 'ip = \'' . $frm_env['REMOTE_ADDR'] . '\'');
          array_push ($inserts, 'comment = \'' . quote ($row['comment']) . '\'');
          array_push ($inserts, 'vote = \'' . $row['vote'] . '\'');
          array_push ($inserts, 'date = now()');
          $qu = 'update hl_votes set ' . join (',', $inserts) . ' where id = ' . $rowt['id'];
          mysql_query ($qu);
          ++$qupdates;
        }

        if (0 < $qupdates)
        {
          $q = 'delete from hl_votes where confirm = \'' . quote ($frm['code']) . '\'';
          $sth = mysql_query ($q);
          $success = 2;
        }
        else
        {
          $q = 'update hl_votes set confirm = \'0\' where confirm = \'' . quote ($frm['code']) . '\'';
          $sth = mysql_query ($q);
          $success = 1;
        }
      }
    }

    $smarty->assign ('listing_id', $row['listing_id']);
    $smarty->assign ('success', $success);
    $smarty->display ('vote_confirmed.tpl');
    exit ();
  }

  $frm['lid'] = intval ($frm['lid']);
  if ($frm['lid'])
  {
    $q = 'select * from hl_listings where id = ' . $frm['lid'];
    $sth = mysql_query ($q);
    $listing = mysql_fetch_array ($sth);
    if (!$listing)
    {
      header ('Location: ?a=home');
      exit ();
    }
  }

  $smarty->assign ('listing', $listing);
  if ($frm['display'] == 'confirm')
  {
    $smarty->display ('vote_confirm.tpl');
  }
  else
  {
    if ($frm['display'] == 'accepted')
    {
      $smarty->display ('vote_accepted.tpl');
    }
    else
    {
      if ($frm['action'] == 'save')
      {
        $frm['vote'] = intval ($frm['vote']);
        if ($frm['vote'] < 0)
        {
          $frm['vote'] = 0;
        }

        if (3 < $frm['vote'])
        {
          $frm['vote'] = 3;
        }

        $inserts = array ();
        array_push ($inserts, 'listing_id = \'' . $frm['lid'] . '\'');
        array_push ($inserts, 'ip = \'' . $frm_env['REMOTE_ADDR'] . '\'');
        array_push ($inserts, 'email = \'' . quote ($frm['email']) . '\'');
        array_push ($inserts, 'comment = \'' . quote ($frm['comment']) . '\'');
        array_push ($inserts, 'vote = \'' . $frm['vote'] . '\'');
        array_push ($inserts, 'date = now()');
        $confirm_code = gen_confirm_code (10);
        if ($settings['vote_confirmation_require'])
        {
          array_push ($inserts, 'confirm = \'' . $confirm_code . '\'');
          $q = 'insert into hl_votes set ' . join (',', $inserts);
        }
        else
        {
          $qvotes = 0;
          $qt = 'select id from hl_votes where confirm = \'0\' and  email = \'' . quote ($frm['email']) . '\' and listing_id = ' . $frm['lid'];
          $sth = mysql_query ($qt);
          while ($row = mysql_fetch_array ($sth))
          {
            $q = 'update hl_votes set ' . join (',', $inserts) . ' where id = ' . $row['id'];
            ++$qvotes;
            $success = 2;
          }

          if ($qvotes == 0)
          {
            $q = 'insert into hl_votes set ' . join (',', $inserts);
            $success = 1;
          }
        }

        $sth = mysql_query ($q);
        if ($settings['vote_confirmation_require'])
        {
          $info = array ();
          $info['confirm_code'] = $confirm_code;
          $info['listing_name'] = $listing['name'];
          send_mail ('vote_confirm', $frm['email'], $settings['system_email'], $info);
          header ('Location: ?a=add_vote&lid=' . $frm['lid'] . '&display=confirm');
        }
        else
        {
          header ('Location: ?a=add_vote&lid=' . $frm['lid'] . ('' . '&display=accepted&success=' . $success));
        }
      }
    }
  }

?>
