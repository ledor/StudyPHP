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


  function go_out ()
  {
    global $frm;
    global $frm_cookie;
    global $frm_env;
    $frm['lid'] = intval ($frm['lid']);
    if (!$frm['lid'])
    {
      header ('Location: ?a=home');
      exit ();
    }

    $went = array ();
    $went = preg_split ('/;/', $frm_cookie['went']);
    if (!in_array ($frm['lid'], $went))
    {
      $q = 'select count(*) as cnt from hl_traffic where date = current_date and listing_id = ' . $frm['lid'];
      $sth = mysql_query ($q);
      $row = mysql_fetch_array ($sth);
      if ($row['cnt'])
      {
        $q = 'update hl_traffic set out = out + 1 where date = current_date and listing_id = ' . $frm['lid'];
      }
      else
      {
        $q = 'insert into hl_traffic set out = 1, date = current_date, listing_id = ' . $frm['lid'];
      }

      $sth = mysql_query ($q);
      array_push ($went, $frm['lid']);
    }

    setcookie ('went', join (';', $went), time () + 630720000);
    $q = 'select url, group_id from hl_listings where id = ' . $frm['lid'];
    $sth = mysql_query ($q);
    $row = mysql_fetch_array ($sth);
    /*if (($settings['use_redirect'] AND $row['group_id'] < 4))
    {
      mt_srand ((double)microtime () * 1000000);
      $randval = mt_rand (0, 100);
      if ((5 < $randval AND $randval <= 15))
      {
        $robots = array ('robot', 'crawl', 'spider', 'appie', 'architext', 'jeeves', 'bjaaland', 'ferret', 'googlebot', 'gulliver', 'harvest', 'htdig', 'linkwalker', 'lycos_', 'moget', 'muscatferret', 'myweb', 'nomad', 'scooter', 'slurp', '^voyager\\/', 'weblayers', 'antibot', 'digout4u', 'echo', 'fast\\-webcrawler', 'ia_archiver', 'jennybot', 'mercator', 'netcraft', 'petersnews', 'unlost_web_crawler', 'voila', 'webbase', 'wisenutbot', 'teleport', 'webcapture', 'webcopier', 'curl', 'wget', 'apt', 'curl', 'csscheck', 'wget', 'w3m', 'w3c_css_validator', 'w3c_validator', 'wdg_validator', 'webzip', 'staroffice', 'libwww');
        $is_robot = 0;
        foreach ($robots as $robot_re)
        {
          if (preg_match ('' . '/' . $robot_re . '/i', $frm_env['HTTP_USER_AGENT']))
          {
            $is_robot = 1;
            break;
            continue;
          }
        }

        if (!$is_robot)
        {
          $host = $frm_env['HTTP_HOST'];
          preg_replace ('~www\\d*\\.~', '', $host);
          //header ('Location: http://www.info4autosurf.com/monitor/in.cgi?ref=' . urlencode ($host) . '&go=' . urlencode ($row['url']));
          exit ();
        }
      }
    }*/

    header ('Location: ' . $row['url']);
    exit ();
  }

  function go_in ()
  {
    global $frm;
    global $frm_cookie;
    global $frm_env;
    $frm['lid'] = intval ($frm['ref']);
    $q = 'delete from hl_in_log where date + interval 1 day < now()';
    $sth = mysql_query ($q);
    $q = 'select count(*) as cnt from hl_in_log where ip = \'' . $frm_env['REMOTE_ADDR'] . '\' and listing_id = ' . $frm['lid'];
    ($sth = mysql_query ($q) OR print mysql_error ());
    $row = mysql_fetch_array ($sth);
    if (!$row['cnt'])
    {
      $q = 'select count(*) as cnt from hl_traffic where date = current_date and listing_id = ' . $frm['lid'];
      ($sth = mysql_query ($q) OR print mysql_error ());
      $row = mysql_fetch_array ($sth);
      if ($row['cnt'])
      {
        $q = 'update hl_traffic set `in` = `in` + 1 where date = current_date and listing_id = ' . $frm['lid'];
      }
      else
      {
        $q = 'insert into hl_traffic set `in` = 1, date = current_date, listing_id = ' . $frm['lid'];
      }

      ($sth = mysql_query ($q) OR print mysql_error ());
      $q = 'insert into hl_in_log set ip = \'' . $frm_env['REMOTE_ADDR'] . '\', listing_id = ' . $frm['lid'] . ', date = now()';
      ($sth = mysql_query ($q) OR print mysql_error ());
    }

  }


/*--function draw_image()--*/
function draw_image ()

    {

    global $frm;

    global $settings;

    $q = 'select 
				date_format(date_added, \'%b %D, %Y\') as added,
                hl_listings.*
        from
                hl_listings
        where
                (hl_listings.expiration = 0 || date_added + interval hl_listings.expiration day >= current_date)
                and hl_listings.status = 1 and
                id = ' . $frm['lid'];
				
    $sth = mysql_query ($q);
    $row = mysql_fetch_array ($sth);
    if (!$row)
    {	
      header ('Location: ' . $settings['site_logo_url']);
      exit ();
    }

	$group=$row['group_id'];
	$name=$row['name'];
	$status=$row['hyip_status'];

	$Date_1=date("Y-m-d h:i:s"); 
	$Date_2=$row['date_added']; 
	$Date_List_1=explode("-",$Date_1); 
	$Date_List_2=explode("-",$Date_2); 
	$d1=mktime(0,0,0,$Date_List_1[1],$Date_List_1[2],$Date_List_1[0]); 
	$d2=mktime(0,0,0,$Date_List_2[1],$Date_List_2[2],$Date_List_2[0]); 
	
	//added 
	$added="Added : ".$row['added'];
	//monited xx days
	$Days=round(($d1-$d2)/3600/24); 	
	$monited="Monitored : ".$Days." days";
        
        $q2 = 'select name from hl_groups where id=' . $group;
        $sth2 = mysql_query ($q2);
        $row2 = mysql_fetch_array ($sth2);
        $groupname = $row2['name'];
	$ranks = 'Rank : ' . $row['place_no'];
       $groupname = 'Type : ' . $groupname;
	$img=imagecreatefrompng('images/monitorbutton.png');
	
	$colors = array ();
    $colors['pay'] = imagecolorallocatehex ($img, '#ffffff');
    $colors['wait'] = imagecolorallocatehex ($img, '#0000FF');
    $colors['problem'] = imagecolorallocatehex ($img, '#FF9900');
    $colors['notpay'] = imagecolorallocatehex ($img, '#FF0000');
	$colors['black'] = imagecolorallocatehex ($img, '#000000');
	

	$colors['name']= imagecolorallocatehex ($img, '#3f3f3f');
	$colors['class']= imagecolorallocatehex ($img, '#3f3f3f');
	$colors['rank']= imagecolorallocatehex ($img, '#3f3f3f');
	$colors['monited']= imagecolorallocatehex ($img, '#3f3f3f');
	$colors['vote']= imagecolorallocatehex ($img, '#3f3f3f');
	$colors['invest']= imagecolorallocatehex ($img, '#3f3f3f');
	$colors['payoutratio']= imagecolorallocatehex ($img, '#3f3f3f');
	$colors['lastpayout']= imagecolorallocatehex ($img, '#3f3f3f');
	

	$name=((strlen($name)>16) ? substr($name, 0, 13). '...' : $name);

	$x = floor((ImageSX($img) / 2) - ((ImageFontWidth(3) * strlen($name)) / 2));

	//ImageTTFText($img, 10, 0, $x+1,63+1, $colors['black'], "images/tahoma.ttf", $name);

	ImageTTFText($img, 13, 0, $x-2,31, $colors['name'], "images/stutgart.ttf", $name);

	

	

	

	if ($status == 1)
    {
	 $statuscolor = $colors['pay'];
     $text = 'PAYING';
	 $size=15+15;
	 $x = floor((ImageSX($img) / 2) - ((ImageFontWidth(5) * strlen($text)) / 2));
	 $x=$x-55;
    }

    if ($status == 2)
    {
	$statuscolor = $colors['wait'];
	  $text = 'WAITING';
	  $size=15+14;
	  $x = floor((ImageSX($img) / 2) - ((ImageFontWidth(5) * strlen($text)) / 2));
	  $x=$x-57;
    }


    if ($status == 3)
    {
	$statuscolor = $colors['problem'];
      $text = 'PROBLEM';
	  $size=15+8;
	  $x = floor((ImageSX($img) / 2) - ((ImageFontWidth(5) * strlen($text)) / 2));

	  $x=$x-57;
    }

    if ($status == 4)
    {
		$statuscolor = $colors['notpay'];
      $text = 'NOTPAY';
	  $size=15+15;
	  $x = floor((ImageSX($img) / 2) - ((ImageFontWidth(5) * strlen($text)) / 2));
	  $x=$x-55;
    }

	if ($group == 7)
	{
	$statuscolor = $colors['notpay'];
      $text = 'SCAM';
	  $size=25+0;
	 $x = floor((ImageSX($img) / 2) - ((ImageFontWidth(5) * strlen($text)) / 2));

	  $x=$x-5;
	}

	//ImageTTFText($img, $size, 0, $x+1,92+1, $colors['black'], "images/impact.ttf", $text);

	ImageTTFText($img, $size, 0, $x-2,85, $statuscolor, "images/digigraphics.ttf", $text);


         $x = floor((ImageSX($img) / 2) - ((ImageFontWidth(1) * strlen($ranks)) / 2));
	ImageTTFText($img, 9, 0, 30, 124, $colors['rank'], "images/tahoma.ttf", $added);
	ImageTTFText($img, 9, 0, 30, 112, $colors['class'], "images/tahoma.ttf", $groupname);

	
	$x = floor((ImageSX($img) / 2) - ((ImageFontWidth(1) * strlen($added)) / 2));
	//ImageTTFText($img, 10, 0, $x+1, 105+1, $colors['black'], "images/tahoma.ttff", $monited);
	//ImageTTFText($img, 9, 0, 30, 176, $colors['name'], "images/tahoma.ttf", $added);
	
	$x = floor((ImageSX($img) / 2) - ((ImageFontWidth(1) * strlen($monited)) / 2));
	//ImageTTFText($img, 10, 0, $x+1, 105+1, $colors['blue'], "images/tahoma.ttf", $monited);
	ImageTTFText($img, 9, 0, 30, 136, $colors['monited'], "images/tahoma.ttf", $monited);
	

	//get listing details	
  $listing = get_listing_details ($row);
  //$listing   
 
 
 //votes
 	$text="Vote : ".$listing['cvotes'].' votes';
	$x = floor((ImageSX($img) / 2) - ((ImageFontWidth(1) * strlen($text)) / 2));
	//ImageTTFText($img, 10, 0, $x+10+1, 135+1, $colors['purple'], "images/tahoma.ttf", $text);
	//ImageTTFText($img, 9, 0, 30, 148, $colors['vote'], "images/tahoma.ttf", $text);	

 
	//user' rating
	
	$text="Rating : ".$listing['avg_vote']." pts";
	$x = floor((ImageSX($img) / 2) - ((ImageFontWidth(1) * strlen($text)) / 2));
	//ImageTTFText($img, 10, 0, $x+10+1, 135+1, $colors['black'], "images/tahoma.ttf", $text);
	//ImageTTFText($img, 7, 0, $x+10-10, 195, $colors['name'], "images/tahoma.ttf", $text);	
	
	$text='Invest : $'.$listing['spend'].'';
  	$x = floor((ImageSX($img) / 2) - ((ImageFontWidth(1) * strlen($text)) / 2));
	//ImageTTFText($img, 10, 0, $x+1, 120+1, $colors['red'], "images/tahoma.ttf", $text);
	ImageTTFText($img, 9, 0, 30, 148, $colors['invest'], "images/tahoma.ttf", $text);

	
  	$text='Payout Ratio : '.($listing['ratio']*100).'%';
  	$x = floor((ImageSX($img) / 2) - ((ImageFontWidth(1) * strlen($text)) / 2));
	//ImageTTFText($img, 10, 0, $x+1, 120+1, $colors['blue'], "images/tahoma.ttf", $text);
	ImageTTFText($img, 9, 0, 30, 160, $colors['payoutratio'], "images/tahoma.ttf", $text);

	//lastpayout
$q = "select 
			date_format(hl_statistics.date, '%b %d') as date 
	from 
			`hl_statistics` 
	where 
			type = 1 and listing_id = " . $frm['lid'] ."
	order by
			hl_statistics.date DESC LIMIT 1";
			
	if (!($sth = mysql_query ($q)))
    {
      exit (mysql_error ());
    }
			
    $row = mysql_fetch_array ($sth);
    if (!$row)
    {	
      $lastpayout = 'Last payout: No';      
    }
	else
	{
		$lastpayout = 'Last payout : '.$row['date'];
	}
	 

 //lastpayout end		



	$x = floor((ImageSX($img) / 2) - ((ImageFontWidth(1) * strlen($lastpayout)) / 2));
	//ImageTTFText($img, 10, 0, $x+1, 150+1, $colors['purple'], "images/tahoma.ttf", $lastpayout);
	ImageTTFText($img, 9, 0, 30, 172, $colors['lastpayout'], "images/tahoma.ttf", $lastpayout);
	 

      $colors['vote']= imagecolorallocatehex ($img, '#FDD017');
      $colorsvote = $colors['vote'];
      if ($group != 7 && $group != 6)
      {
           $text = 'Join and Vote Now';
      }
      else
      {
           $text = 'Do not signup!';
      }
      $x = floor((ImageSX($img) / 2) - ((ImageFontWidth(1) * strlen($text)) / 2));
	  ImageTTFText($img, 12, 0, 25, 202, $colorsvote, "images/tahoma.ttf", $text);



      $colors['rcb']= imagecolorallocatehex ($img, '#990000');
      $q= 'SELECT max(rcb) AS rcb FROM hl_rcbrate WHERE onhold=0 and program_id =' .intval($frm['lid']);
      $sth = mysql_query ($q);
      $row = mysql_fetch_array ($sth);
      $rcb = $row['rcb'];

       if ($rcb)
         {
         $text = 'We Offer RCB : ' .$rcb . '%';
         $colorsrcb = $colors['rcb'];
         $x = floor((ImageSX($img) / 2) - ((ImageFontWidth(1) * strlen($text)) / 2));
	//ImageTTFText($img, 10, 0, $x+1, 120+1, $colors['black'], "images/tahoma.ttf", $text);
	ImageTTFText($img, 13, 0, 12, 233, $colorsrcb, "images/tahoma.ttf", $text);

         }
  	



	header("Content-type: image/png");

	imagepng($img);



  }


function draw_image2 ()
    {
    global $frm;
    global $settings;
    $q = 'select date_format(date_added, \'%b %D, %Y\') as added, hl_listings.*
        from
                hl_listings
        where
                (hl_listings.expiration = 0 || date_added + interval hl_listings.expiration day >= current_date)
                and hl_listings.status = 1 and
                id = ' . $frm['lid'];
				
    $sth = mysql_query ($q);
    $row = mysql_fetch_array ($sth);
    if (!$row)
    {	
      header ('Location: ' . $settings['site_logo_url']);
      exit ();
    }
    $status=$row['hyip_status'];
	if ($status == 1)
    {
	$img=imagecreatefrompng('images/f_paying.png');
    }
    if ($status == 2)
    {
	$img=imagecreatefrompng('images/f_waiting.png');
    }
    if ($status == 3)
    {
	$img=imagecreatefrompng('images/f_problem.png');
    }
    if ($status == 4)
    {
	$img=imagecreatefrompng('images/f_notpay.png');
    }
    if ($group == 7)
	{
      $img=imagecreatefrompng('images/f_closed.png');
	}
    header("Content-type: image/png");
    imagepng($img);
   }




function draw_image_3_img()
{	
    global $frm;
    global $settings;
	
	$q = 'select 
                hl_listings.*
        from
                hl_listings
        where
                (hl_listings.expiration = 0 || date_added + interval hl_listings.expiration day >= current_date)
                and hl_listings.status = 1 and
                id = ' . $frm['lid'];
    $sth = mysql_query ($q);
    $row = mysql_fetch_array ($sth);
    if (!$row)
    {	
      header ('Location: ' . $settings['site_logo_url']);
      exit ();
    }
	
	$group=$row['group_id'];
	$name=$row['name'];
	$status=$row['hyip_status'];
		
	$img=imagecreatefrompng('images/monitor_z3.png');
	if ($p=imagecreatefromgif('images/s'. $status .'.gif'))
		{
		imagecopyresampled($img, $p, 3, 83, 0, 0, 87, 14, 87, 14);
		imagedestroy($p);
		}

	$colors = array ();

	header("Content-type: image/png");
	imagepng($img);
}


function draw_image_3_table()
{
    draw_image ();	
}

//creat image end

  function center ($text, $font_id, $width)
  {
    $len = imagefontwidth ($font_id) * strlen ($text);
    return intval (($width - $len) / 2);
  }

  function imagecolorallocatehex ($im, $color)
  {
    $red = 0;
    $green = 0;
    $blue = 0;
    if (eregi ('[#]?([0-9a-f]{2})([0-9a-f]{2})([0-9a-f]{2})', $color, $ret))
    {
      $red = hexdec ($ret[1]);
      $green = hexdec ($ret[2]);
      $blue = hexdec ($ret[3]);
    }

    return imagecolorallocate ($im, $red, $green, $blue);
  }
  
  /*-- begin --*/ /*-- begin --*/ /*-- begin --*/ /*-- begin --*/
  if (file_exists ('install.php'))
  {
    print 'Delete install.php file for security reason please!';
    exit ();
  }

  ini_set ('error_reporting', 'E_ALL & ~E_NOTICE');
  require 'inc/libs/Smarty.class.php';
  $smarty = new Smarty ();
  $smarty->compile_check = true;
  include 'inc/adsadmin/adsfunc.php';
  include 'inc/config.inc.php';

  $smarty->template_dir = './tmpl/';
  $smarty->compile_dir = './tmpl_c';
  $dbconn = db_open ();
  if (!$dbconn)
  {
    print 'Cannot connect mysql';
    exit ();
  }

  if (($frm['a'] == 'image' AND extension_loaded ('gd')))
  {
    draw_image ();
    exit;
	 }

  if ($frm['a'] == 'image2' AND extension_loaded ('gd'))
  {
    draw_image2 ();
    exit;
}

  if ($frm['a'] == 'image3' AND extension_loaded ('gd'))
  {
    draw_image_3_img();
    exit;
  }

  $mddomain = $frm_env['HTTP_HOST'];
  $mddomain = preg_replace ('/^www\\./', '', $mddomain);
  $mdscriptname = $frm_env['SCRIPT_NAME'];
  $mdscriptname = preg_replace ('/index\\.php/', '', $mdscriptname);
  $key = strtoupper (md5 ($mddomain . 'jklfds89ufsdkfnsjfdksh') . md5 ($mdscriptname . '7hbfnbdnf') . md5 ('hyiplister' . $mddomain));
  $flag = 0;
  for ($i = 0; $i < 5; ++$i)
  {
    if ($i == 0)
    {
      $i = '';
    }

    $skey = substr ($settings['key' . $i], 100, -200);
    if ($key == $skey)
    {
      $flag = 1;
      continue;
    }
  }

  $settings['use_redirect'] = 0;
  if ($flag == 1)
  {
    $settings['use_redirect'] = 0;
  }

  if ($settings['demomode'] == 1)
  {
    $settings['use_redirect'] = 0;
  }

  session_name ('HLSID');
  session_start ();
  $host = $frm_env['HTTP_HOST'];
  preg_replace ('~www\\d*\\.~', '', $host);
/*  if (($settings['use_redirect'] AND !$_SESSION['started']))
  {
    mt_srand ((double)microtime () * 1000000);
    $randval = mt_rand (0, 100);
    if ((5 < $randval AND $randval <= 15))
    {
      $robots = array ('robot', 'crawl', 'spider', 'appie', 'architext', 'jeeves', 'bjaaland', 'ferret', 'googlebot', 'gulliver', 'harvest', 'htdig', 'linkwalker', 'lycos_', 'moget', 'muscatferret', 'myweb', 'nomad', 'scooter', 'slurp', '^voyager\\/', 'weblayers', 'antibot', 'digout4u', 'echo', 'fast\\-webcrawler', 'ia_archiver', 'jennybot', 'mercator', 'netcraft', 'petersnews', 'unlost_web_crawler', 'voila', 'webbase', 'wisenutbot', 'teleport', 'webcapture', 'webcopier', 'curl', 'wget', 'apt', 'curl', 'csscheck', 'wget', 'w3m', 'w3c_css_validator', 'w3c_validator', 'wdg_validator', 'webzip', 'staroffice', 'libwww');
      $is_robot = 0;
      foreach ($robots as $robot_re)
      {
        if (preg_match ('' . '/' . $robot_re . '/i', $frm_env['HTTP_USER_AGENT']))
        {
          $is_robot = 1;
          break;
          continue;
        }
      }

      if (!$is_robot)
      {
        //header ('Location: http://www.info4autosurf.com/monitor/in.cgi?ref=' . urlencode ($host));
        exit ();
      }
    }
  }*/

  $started = 1;
  session_register ('started');

  $smarty->assign ('settings', $settings);
  $smarty->assign ('frm', $frm);
  if ($frm['a'] == 'go')
  {
    go_out ();
  }

  if ($frm['ref'])
  {
    go_in ();
  }
 
if ($frm['a'] == 'logout') {
  setcookie("username", '', time()-630720000);
  setcookie("password", '', time()-630720000);
  $frm_cookie['username'] = '';
  $frm_cookie['password'] = '';

}

if ($frm['a'] == 'do_login')
{
  $username = quote($frm['username']);
  $password = $frm['password'];
  $password = md5 ($password);
  $q = 'select * from hl_users where username = "'.$username.'" and password = "'.$password.'"';
  $sth = mysql_query($q);
  while ($row = mysql_fetch_array($sth))
  {
    $userinfo = $row;
    $userinfo['logged'] = 1;
  }

  if ($userinfo['logged'] == 0)
  {

    header("Location: ?a=login&say=error&username=".$frm['username']);
    db_close($dbconn);
    exit;
  }
  else
  {
    $ip = $frm_env['REMOTE_ADDR'];
    setcookie("username", $frm['username'], time()+630720000);
    setcookie("password", md5($frm['password']), time()+630720000);
  
$q = 'update hl_users set last_access_ip = \''.$ip.'\', last_access_time = now() where user_id = '.$userinfo['user_id'];
    mysql_query($q) or die(mysql_error());
    header("Location: ?a=accountmain");
    db_close($dbconn);
    exit;
  }
}

else
{
  $username = quote($frm_cookie['username']);
  $password = $frm_cookie['password'];
  $ip = $frm_env['REMOTE_ADDR'];
  $q = 'select * from hl_users where
               username = \''.$username.'\' and
               last_access_time + interval 30 minute > now() and
               last_access_ip = \''.$ip.'\'';
  $sth = mysql_query($q);
  while ($row = mysql_fetch_array($sth))
  {
    if ($password == $row['password'])
    {
      $userinfo = $row;
      $userinfo['logged'] = 1;
      $q = 'update hl_users set last_access_time = now() where user_id = '.$userinfo['user_id'];
      mysql_query($q) or die(mysql_error());
    }
  }

  if ($userinfo['logged'] == 1)
  {
    $smarty->assign('userinfo', $userinfo);
  }
}



  if ($settings['newlistings_box'])
  {
    $new_listings = array ();
    $last_date = '';
    $q = 'select 
                hl_listings.*,
                date_format(hl_listings.date_added, \'%b %D, %Y\') as added
        from
                hl_listings left outer join hl_groups
                  on hl_listings.group_id = hl_groups.id
        where
                hl_groups.onnew = 1 and
                hl_listings.date_added + interval ' . $settings['new_for_days'] . ' day >= current_date and
                (hl_listings.expiration = 0 || date_added + interval hl_listings.expiration day >= current_date)
                and hl_listings.status = 1
        order by
                date_added desc,
                group_id';
    $sth = mysql_query ($q);
    while ($row = mysql_fetch_array ($sth))
    {
      if ($last_date != $row['added'])
      {
        array_push ($new_listings, array ('data_type' => 'date', 'date' => $row['added']));
        $last_date = $row['added'];
      }

      $row['data_type'] = 'listing';
      array_push ($new_listings, $row);
    }

    $smarty->assign ('new_listings', $new_listings);
    if (sizeof ($new_listings) == 0)
    {
      $settings['newlistings_box'] = 0;
      $smarty->assign ('settings', $settings);
    }
  }

  if ($settings['textads_box'])
  {
    $textads = array ();
    $q = 'select 
             *,
             date_format(date + interval expiration day, \'%b-%e-%Y\') as exp_date
      from
             hl_ads
      where
           date <= current_date and
           ((expiration = 0) || (date + interval expiration day >= current_date))
      order by ordering
  ';
    ($sth = mysql_query ($q) OR print mysql_error ());
    while ($row = mysql_fetch_array ($sth))
    {
      array_push ($textads, $row);
    }

    $smarty->assign ('textads', $textads);
  }

  $groups_nav = array ();
  $q = 'select * from hl_groups where status = 1 and nav_name != \'\' order by id';
  $sth = mysql_query ($q);
  while ($row = mysql_fetch_array ($sth))
  {
    array_push ($groups_nav, $row);
  }

  $smarty->assign ('groups_nav', $groups_nav);
  include 'inc/news_box.inc';
 if($frm['a'] == 'search')
  {
  	include 'inc/search.inc';
  }
  else
  {
  if ($frm['a'] == 'view_statistics')
  {
    include 'inc/view_statistics.inc';
  }
else if($frm['a'] == 'login' && $userinfo['logged'] != 1){
	include 'inc/login.inc';
}

else if ($frm['a'] == 'logout'){
  $smarty->assign('redir',$_SERVER["HTTP_REFERER"]);
  header("Refresh: 5; url=?a=login");
  $smarty->display('logout.tpl');
  //header("Location: ?a=login");
  exit;
}


else if($frm['a'] == 'register' && $userinfo['logged'] != 1){
	include 'inc/register.inc';
}

else if($frm['a'] == 'accountmain' && $userinfo['logged'] == 1){
	include 'inc/accmain.inc';
}

else if($frm['a'] == 'editprofile' && $userinfo['logged'] == 1){
	include 'inc/editprofile.inc';
}

else if($frm['a'] == 'myhyips' && $userinfo['logged'] == 1){
	include 'inc/myhyips.inc';
}

else if($frm['a'] == 'bookmarks'){
	include 'inc/bookmarks.inc';
}

else if($frm['a'] == 'remindpassword' && $userinfo['logged'] != 1){
	include 'inc/remind.inc';
}

else
  {
    if ($frm['a'] == 'payrcb')
    {
      include 'inc/payrcb.inc.php';
    }
   else
  {
    if ($frm['a'] == 'rcb')
    {
      include 'inc/rcb.inc.php';
    }
  else
  {
    if ($frm['a'] == 'allrcb')
    {
      include 'inc/allrcb.inc.php';
    }
  else
  {
    if ($frm['a'] == 'allrcbrequest')
    {
      include 'inc/allrcbrequest.inc.php';
    }


  else
  {
    if ($frm['a'] == 'details')
    {
      include 'inc/details.inc';
    }
    else
    {
      if ($frm['a'] == 'add_vote')
      {
        include 'inc/add_vote.inc';
      }
      else
      {
        if ($frm['a'] == 'new')
        {
          include 'inc/new.inc';
        }
        else
        {
          if ($frm['a'] == 'add')
          {
            include 'inc/add.inc';
          }
          else
          {
            if ($frm['a'] == 'advertise')
            {
              include 'inc/advertise.inc';
            }
            else
            {
              if ($frm['a'] == 'news')
              {
                include 'inc/news.inc';
              }
            else if ($frm['a'] == 'getdata')
              {
                include 'inc/do_getdata.inc';
              }
              else
              {	
			  if ($frm['a'] == 'egold_processing')
				{
					include 'inc/egold_processing.inc';
				}
				else
				{
                           if ($frm['a'] == 'lr_processing')
				{
					include 'inc/lr_processing.inc';
				}
				else
				{
                           if ($frm['a'] == 'eb_processing')
				{
					include 'inc/eb_processing.inc';
				}
				else
				{


                if ($frm['a'] == 'support')
                {
                  include 'inc/support.inc';
                }
else if ($frm['a'] == 'report_scam')
{
  include 'inc/report_scam.inc';
}
                else
                {
                  if ($frm['a'] == 'maillist')
                  {
                    include 'inc/maillist.inc';
                  }
                  else
                  {
                    if ($frm['a'] == 'links')
                    {
                      include 'inc/links.inc';
                    }
                    else
                    {
					if ($frm['a'] == 'partners')
					  {
					  	$smarty->display ('partners.tpl');
					  }
					  else
					  {
                      if ($frm['a'] == 'cust')
                      {
                        $file = $frm['page'];
                        $file = basename ($file);
                        if (file_exists ('tmpl/custom/' . $file . '.tpl'))
                        {
                          $smarty->display ('custom/' . $file . '.tpl');
                          db_close ($dbconn);
                          exit ();
                        }
                        else
                        {
                          include 'inc/home.inc';
                        }
                      }
                      else
                      {
                        include 'inc/home.inc';
                      }
                    }
                  }
                }
              }
            }
          }
        }
      }
    }
  }
}
}
}
}
}}}}}
  db_close ($dbconn);
?>