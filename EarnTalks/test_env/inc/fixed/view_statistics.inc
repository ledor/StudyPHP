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


  $frm['lid'] = intval ($frm['lid']);
  $q = 'select * from hl_listings where id = ' . $frm['lid'];
  if (!($sth = mysql_query ($q)))
  {
    exit (mysql_error ());
    ;
  }

  $listing = mysql_fetch_array ($sth);
  if (!$listing)
  {
    header ('Location: ?a=home');
    exit ();
  }

  $smarty->assign ('listing', $listing);
  $q = 'select *, date_format(date, \'%b %D, %Y\') as fdate from hl_statistics where listing_id = ' . $frm['lid'] . ' order by date';
  if (!($sth = mysql_query ($q)))
  {
    exit (mysql_error ());
    ;
  }

  $stats = array ();
  $payouts = 0;
  $countall = 0;
  while ($row = mysql_fetch_array ($sth))
  {
    ++$countall;
    if ($row['type'] == 1)
    {
      $profit += $row['amount'];
      ++$payouts;
    }

    if ($row['type'] == 0)
    {
      $spend += $row['amount'];
    }

    $row['amount'] = number_format ($row['amount'], 2);
    array_push ($stats, $row);
  }

  $smarty->assign ('stats', $stats);
  if ($spend != 0)
  {
    $ratio = sprintf ('%.02f', $profit / $spend);
  }
  else
  {
    $ratio = sprintf ('%.02f', 0);
  }

  $smarty->assign ('ratio', $ratio);
  $smarty->assign ('countall', $countall);
  $smarty->assign ('payouts', $payouts);
  $smarty->display ('view_statistics.tpl');
?>
