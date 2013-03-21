<?

{

   if ($frm['a'] == 'rcb')
    {
      if ($frm['action'] == 'submited')
      {
       $rcbid = time();
       $datetime = date('Y-m-d H:i:s');
       $lid = $frm['lid'];
       $username = ereg_replace( ' +', '', $frm['username'] );
       $deposit = $frm['deposit'];

       $q='select * from hl_rcbreport where username="'.$username.'" and lid='.$lid;
       $sth = mysql_query ($q);
       if (mysql_num_rows($sth) > 0)
        {
        $firstime=0;
        }
        else
        {
        $firstime=1; 
        }


       $q='select * from hl_rcbrate where used=1 and program_id='.$lid;
       $sth = mysql_query ($q);
       $row = mysql_fetch_array ($sth);
         if ($row['type']=='LD')
         {
            $q='select * from hl_rcbrate where used=1 and program_id='.$lid.' and '.$deposit.' BETWEEN depositfrom And depositto';
         }
       $sth = mysql_query ($q);
       $row = mysql_fetch_array ($sth);
       if (mysql_num_rows($sth) > 0)
       {
         if ($firstime==1)
            {
             $rcb = $deposit*$row['rcb']/100*$row['ref']/100+$row['bonus'];
            }
            else
            {
            $rcb = $deposit*$row['rcb2']/100*$row['ref']/100+$row['bonus2'];
            }

       if ($rcb<=0)
       {
       echo ' <script>alert("Deposit wrong,Check again!");go(-1);</script>'; 
       }
       else
       {
       

     $ips = $_SERVER['REMOTE_ADDR'];
     $lang = $_SERVER['HTTP_ACCEPT_LANGUAGE'];


       $email = $frm['email'];
       $ec = $frm['ec'];
       $ecno = $frm['ecno'];
       $status = 'Waiting For Check...';
       $say='added';
       $q = 'insert into hl_rcbreport set  rcbid="'.$rcbid.'",lid="'.$lid.'",username="'.$username.'",deposit="'.$deposit.'",rcb=round("'.$rcb.'",2),email="'.$email.'",ec="'.$ec.'",ips="'.$ips.'",lang="'.$lang.'",ecno="'.$ecno.'",status="' .$status.'",date="'.$datetime.'"';
       if (!($sth = mysql_query ($q)))
        {
        exit (mysql_error ());
        ;
        }

       $q = 'select name from hl_listings where id='.$lid;
       if (!($sth = mysql_query ($q)))
        {
        exit (mysql_error ());
        ;
        }
       $row = mysql_fetch_array ($sth);
       $program = $row['name']; 


       $text = $username .' Sent a RCB Request for Prgram : '.$program. ' Which E-currency is ' .$ec.'-'.$ecno. ' and Amount is '.$rcb . ''; 
       mail ($settings['admin_email'],'A New RCB ReQuest Submited From ' . $settings['site_name'].' ',$text,'From:'.$email);
      header ('Location: ' . $settings['site_url'].'?a=rcb&lid='.$lid.'&say='.$say);

       }

       }
       else
       {
       echo ' <script>alert("Deposit not in list,Check again!");
          window.location="/?a=details&lid='.$lid. '"; 
           </script>'; 

       }        
          



      }



 if ($frm['lid'])
      {

  $frm['lid'] = intval ($frm['lid']);
  $q = 'select  
               *, 
               date_format(date_added, \'%b %D, %Y\') as added,
               date_format(date_closed, \'%b %D, %Y\') as closed,
               (to_days(now()) - to_days(date_added)) as monitored,
               (date_added + interval ' . $settings['new_for_days'] . ' day > current_date) as new
        from
               hl_listings
        where
               id = ' . $frm['lid'] . ' and
               (expiration = 0 || date_added + interval expiration day >= current_date) and
               status = 1
               ';
  if (!($sth = mysql_query ($q)))
  {
    exit (mysql_error ());
    ;
  }

  $listing = mysql_fetch_array ($sth);
  if (!$listing)
  {
    header ('Location: ' . $settings['site_url']);
    exit ();
  }

  $q = 'select * from hl_groups where id = ' . $listing['group_id'];
  if (!($sth = mysql_query ($q)))
  {
    exit (mysql_error ());
    ;
  }

  $group = mysql_fetch_array ($sth);

  $listing = get_listing_details ($listing);
}



    $all_rcbinfo = array ();
    $q = 'select * from hl_rcbreport where lid='.$frm['lid'].' order by date desc';
    $sth = mysql_query ($q);
    while ($row = mysql_fetch_array ($sth))
    {
     if ($row['username'])
      {
      $lu = strlen($row['username']);
      if ($lu>10)
      {
      $lu = 10;
      } 
      if ($lu>3)
      {
      $row['username'] = substr($row['username'],0,$lu-3).'***';
      }
      else
      {
      $row['username'] = substr($row['username'],0,$lu).'***';
      }
      }
     if ($row['ecno'])
      {
      $le = strlen($row['ecno']);
      if ($le>10)
      {
      $le = 10;
      } 
      $row['ecno'] = substr($row['ecno'],0,$le-3).'***';
      }
     array_push ($all_rcbinfo, $row);

    }

        if (sizeof ($all_rcbinfo) == 0)
      {
      $nodata = 1;
      $smarty->assign ('nodata', $nodata);
      }


    $r_info = array ();
    $q='select * from hl_rcbrate where used=1 and program_id='.$frm['lid'].' order by textid';
    $sth = mysql_query ($q);
    while ($row = mysql_fetch_array ($sth))
     {
     $onhold = $row['onhold'];
     $u_rcb  = $row['used'];
     $smarty->assign ('u_rcb', $u_rcb);
     $smarty->assign ('onhold', $onhold);
     array_push ($r_info, $row);

     }    


  $smarty->assign ('r_info', $r_info);
  $smarty->assign ('all_rcbinfo', $all_rcbinfo);
  $smarty->assign ('listing', $listing);
  $smarty->assign ('group', $group);
  $smarty->assign ('votes', $votes);
  $smarty->assign ('say', $say);
  $smarty->assign ('votes_summary', $votes_summary);
  $smarty->assign ('rcb', 1);
  $smarty->display ('rcb.tpl');


}

}
?>