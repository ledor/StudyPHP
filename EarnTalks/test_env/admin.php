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


  if (file_exists ('install.php'))
  {
    print 'Delete install.php file for security reason please!';
    exit ();
  }

  include 'inc/config.inc.php';
  include 'inc/adsadmin/adsfunc.php';  //ads management
  
  global $frm;
  if ($frm['a'] == 'logout')
  {
    setcookie ('username', '', time () + 630720000);
    setcookie ('password', '', time () + 630720000);
    $frm_cookie['username'] = '';
    $frm_cookie['password'] = '';
  }

  $username = ($frm['username'] ? $frm['username'] : $frm_cookie['username']);
  $password = ($frm['password'] ? md5 ($frm['password']) : $frm_cookie['password']);
  if (($username == $settings['admin_login'] AND $password == md5 ($settings['admin_password'])))
  {
    if ($frm['a'] == 'do_login')
    {
      setcookie ('username', $username);
      setcookie ('password', $password);
      header ('Location: admin.php');
      exit ();
    }
  }
  else
  {
    include 'inc/admin/login_form.inc.php';
    exit ();
  }

  $dbconn = db_open ();
  if (!$dbconn)
  {
    print 'Cannot connect mysql';
    exit ();
  }

  include 'inc/admin/silent_actions.inc.php';
  if ($frm['a'] == 'edit_statistics')
  {
    include 'inc/admin/edit_statistics.inc.php';
    exit ();
  }

  if ($frm['a'] == 'edit_votes')
  {
    include 'inc/admin/edit_votes.inc.php';
    exit ();
  }

  include 'inc/admin/html.header.inc.php';
  echo '
  <tr> 
    <td valign="top">
	 <table cellspacing=0 cellpadding=1 border=0 width=100% height=100% bgcolor=#E4CD9C>
	   <tr>
	     <td>
           <table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0">
             <tr bgcolor="#FFFFFF" valign="top"> 
              <td width=300 align=center>
				   <!-- Image Table: Start -->
';
  include 'inc/admin/menu.inc.php';
  echo '				   <br>

              </td>
              <td bgcolor="#E4CD9C" valign="top" width=1><img src=images/q.gif width=1 height=1></td>          
              <td bgcolor="#FFFFFF" valign="top" width=99%>
            <!-- Main: Start -->
            <table width="100%" height="100%" border="0" cellpadding="10" cellspacing="0" class="forTexts">
              <tr>
                <td width=100% height=100% va';
  echo 'lign=top>
';
  if ($frm['a'] == 'listings')
  {
    include 'inc/admin/listings.inc.php';
  }
  else
  {
    if ($frm['a'] == 'new_listings')
    {
      include 'inc/admin/new_listings.inc.php';
    }
    else
    {
      if ($frm['a'] == 'add_listing')
      {
        include 'inc/admin/add_listing.inc.php';
      }
      else
      {
        if ($frm['a'] == 'edit_listing')
        {
          include 'inc/admin/edit_listing.inc.php';
        }
        else
        {
          if ($frm['a'] == 'approve_listing')
          {
            include 'inc/admin/approve_listing.inc.php';
          }
          else
          {
            if ($frm['a'] == 'decline_listing')
            {
              include 'inc/admin/decline_listing.inc.php';
            }
            else
            {
              if ($frm['a'] == 'groups')
              {
                include 'inc/admin/groups.inc.php';
              }
              else
              {
                if ($frm['a'] == 'add_group')
                {
                  include 'inc/admin/add_group.inc.php';
                }
                else
                {
                  if ($frm['a'] == 'edit_group')
                  {
                    include 'inc/admin/edit_group.inc.php';
                  }
                  else
                  {
                    if ($frm['a'] == 'edit_emails')
                    {
                      include 'inc/admin/emails.inc.php';
                    }
                    else
                    {
                      if ($frm['a'] == 'settings')
                      {
                        include 'inc/admin/settings.inc.php';
                      }
                      else
                      {
                        if ($frm['a'] == 'news')
                        {
                          include 'inc/admin/news.inc.php';
                        }
 else
							{
						  	if ($frm['a'] == 'rcbview')
							{
								include 'inc/admin/rcbview.inc.php';
							}

                        else
                        {
                          if ($frm['a'] == 'adsmanagement')
                          {
                            include 'inc/admin/adsmanagement.inc.php';
                          }
						  else
						  {
						  	if ($frm['a'] == 'minibanners')
							{
								include 'inc/adsadmin/edit_mini.php';
							}
							else
							{
						  	if ($frm['a'] == 'toprotatingbanners')
							{
								include 'inc/adsadmin/edit_toprotating.php';
							}
                                                else
							{
						  	if ($frm['a'] == 'extrafunction')
							{
								include 'inc/admin/extrafunction.inc.php';
							}

							else
							{
						  	if ($frm['a'] == 'rotatingbanners')
							{
								include 'inc/adsadmin/edit_rotating.php';
							}
							else
							{
						  		if ($frm['a'] == 'normalbanners')
								{
								include 'inc/adsadmin/edit_normal.php';
								}						  
                          		else
								{
								if ($frm['a'] == 'specialbanners')
								{
								include 'inc/adsadmin/edit_special.php';
								}						  
                          		else
                          		{
                           		 if ($frm['a'] == 'sections')
                            		{
                              		include 'inc/admin/sections.inc.php';
                            		}
                           			 else
                            		{
                              		if ($frm['a'] == 'maillist')
                             		 {
                                		include 'inc/admin/maillist.inc.php';
									  }
                              else
                              {
                                if ($frm['a'] == 'import_transactions')
                                {
                                  include 'inc/admin/import_transactions.inc.php';
                                }
                                else
                                {
                                                                   if ($frm['a'] == 'license')
                                  {
                                    $mddomain = $frm_env['HTTP_HOST'];
                                    $mddomain = preg_replace ('/^www\\./', '', $mddomain);
                                    $mdscriptname = $frm_env['SCRIPT_NAME'];
                                    $mdscriptname = preg_replace ('/admin\\.php/', '', $mdscriptname);
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

                                    $settings['use_redirect'] = 1;
                                    if ($flag == 1)
                                    {
                                      $settings['use_redirect'] = 0;
                                    }

                                    include 'inc/admin/license.inc.php';
                                  }
                                  else
                                  {
                                    include 'inc/admin/main.inc.php';
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
    }
  }
  }
  }
  }
  }
  }
}
}

  echo '              </td>
              </tr>
            </table>
            <!-- Main: END -->

              </td>
             </tr>
           </table>
		  </td>
		 </tr>
	   </table>
	 </td>
  </tr>

';
  include 'inc/admin/html.footer.inc.php';
  $q = 'delete from hl_traffic where date + interval ' . $settings['traffic_count_days'] . ' day < now()';
  if (!($ssth = mysql_query ($q)))
  {
    exit (mysql_error ());
    ;
  }

  db_close ($dbconn);
?>
