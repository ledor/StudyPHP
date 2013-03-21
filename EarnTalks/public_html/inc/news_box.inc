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


  if (($settings['news_box'] AND ($frm['a'] == '' OR $frm['a'] == 'home')))
  {
    $max_news = (0 < $settings['last_news_count'] ? $settings['last_news_count'] : 5);
    $q = '' . 'select 
                 *,
                 date_format(date, \'%b-%e-%Y %r\') as d
           from 
                 hl_news 
           where
                 (expiration = 0 || (date + interval expiration day >= current_date))
           order by 
                 date desc
           limit 
                 0, ' . $max_news;
    ($sth = mysql_query ($q) OR print mysql_error ());
    $news = array ();
    while ($row = mysql_fetch_array ($sth))
    {
      if ($row['small_text'] == '')
      {
        $row['full_text'] = strip_tags ($row['full_text']);
        $row['small_text'] = preg_replace ('/^(.{100,120})\\s.*/', '' . '$1...', $row['full_text']);
      }

      $row['small_text'] = preg_replace ('/
/', '<br>', $row['small_text']);
      array_push ($news, $row);
    }

    if (sizeof ($news) == 0)
    {
      $settings['news_box'] = 0;
      $smarty->assign ('settings', $settings);
    }
    else
    {
      $smarty->assign ('news', $news);
    }
  }
  else
  {
    $settings['news_box'] = 0;
    $smarty->assign ('settings', $settings);
  }

?>
