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


  $groups = array ();
  $q = 'select * from hl_groups where status = 1 and reg_enabled = 1';
  ($sth = mysql_query ($q) OR print mysql_error ());
  while ($row = mysql_fetch_array ($sth))
  {
    array_push ($groups, $row);
  }
  $adtype=$frm['adtype'];

  $smarty->assign ('adtype', $adtype);
  $smarty->assign ('groups', $groups);
  $smarty->display ('advertise.tpl');
?>
