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


  if (!$settings['subscribe_box'])
  {
    header ('Location: ?a=home');
    exit ();
  }

  if ($frm['display'] == 'unsubscribed')
  {
    $smarty->display ('unsubscribed.tpl');
    exit ();
  }

  if ($frm['display'] == 'subscribed')
  {
    $smarty->display ('subscribed.tpl');
    exit ();
  }

  if ($frm['action'] == 'unsubscribe')
  {
    $email = strtolower ($frm['email']);
    $q = '' . 'delete from hl_maillist where email = \'' . $email . '\'';
    mysql_query ($q);
    header ('Location: ?a=maillist&display=unsubscribed');
    exit ();
  }
  else
  {
    $email = strtolower ($frm['email']);
    $errors = array ();
    if (!$email)
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
      $q = '' . 'select count(*) as cnt from hl_maillist where email = \'' . $email . '\'';
      $sth = mysql_query ($q);
      $row = mysql_fetch_array ($sth);
      if ($row['cnt'] == 0)
      {
        $q = '' . 'insert into hl_maillist set email = \'' . $email . '\', ip = \'' . $frm_env['REMOTE_ADDR'] . '\'';
        mysql_query ($q);
      }

      header ('Location: ?a=maillist&display=subscribed');
      exit ();
    }

    $smarty->assign ('errors', $errors);
    $smarty->display ('subscribed.tpl');
  }

?>
