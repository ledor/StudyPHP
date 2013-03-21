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


  if ($settings['demomode'] != 1)
  {
    if ($frm['action'] == 'add')
    {
      $title = quote ($frm['title']);
      $sponsored = intval ($frm['sponsored']);
      $expiration = intval ($frm['expiration']);
      $small_text = quote ($frm_orig['small_text']);
      $small_text = preg_replace ('/\\r/', '', $small_text);
      $full_text = quote ($frm_orig['full_text']);
      $full_text = preg_replace ('/\\r/', '', $full_text);
      $q = '' . 'insert into hl_news set date=now(), title=\'' . $title . '\', small_text=\'' . $small_text . '\', full_text=\'' . $full_text . '\', sponsored = \'' . $sponsored . '\', expiration = \'' . $expiration . '\'';
      (mysql_query ($q) OR print mysql_error ());
    }

    if (($frm['action'] == 'edit' AND $frm['save'] == 1))
    {
      $id = intval ($frm['id']);
      $title = quote ($frm['title']);
      $small_text = quote ($frm_orig['small_text']);
      $small_text = preg_replace ('/\\r/', '', $small_text);
      $full_text = quote ($frm_orig['full_text']);
      $full_text = preg_replace ('/\\r/', '', $full_text);
      $q = '' . 'update hl_news set title=\'' . $title . '\', small_text=\'' . $small_text . '\', full_text=\'' . $full_text . '\', sponsored = \'' . $sponsored . '\', expiration = \'' . $expiration . '\' where id = ' . $id;
      (mysql_query ($q) OR print mysql_error ());
      $frm['action'] = '';
    }

    if ($frm['action'] == 'delete')
    {
      $id = intval ($frm['id']);
      $q = '' . 'delete from hl_news where id = ' . $id;
      (mysql_query ($q) OR print mysql_error ());
    }
  }

  echo '
';
  if ($settings['demomode'] == 1)
  {
    echo start_info_table ('100%');
    echo '<b>Demo version restriction!</b><br>
You cannot add or edit news!
';
    echo end_info_table ();
    echo '<br>
';
  }

  echo '
<b>News Management:</b><br><br>


';
  $q = 'select count(*) as calld from hl_news';
  ($sth = mysql_query ($q) OR print mysql_error ());
  $row = mysql_fetch_array ($sth);
  $count_all = $row['calld'];
  echo '
';
  if (0 < $count_all)
  {
    echo '<table cellspacing=1 cellpadding=2 border=0 width=100%>
';
    $page = $frm['page'];
    $onpage = 20;
    $colpages = ceil ($count_all / $onpage);
    if ($page <= 1)
    {
      $page = 1;
    }

    if (($colpages < $page AND 1 < $colpages))
    {
      $page = $colpages;
    }

    $from = ($page - 1) * $onpage;
    $edit_row = array ();
    $q = '' . 'select 
             *,
             date_format(date, \'%b-%e-%Y %r\') as d,
             ((expiration != 0) && (date + interval expiration day < current_date)) as expired
      from
             hl_news
      order by date desc
      limit ' . $from . ', ' . $onpage;
    ($sth = mysql_query ($q) OR print mysql_error ());
    while ($row = mysql_fetch_array ($sth))
    {
      if (($frm['action'] == 'edit' AND $row['id'] == $frm['id']))
      {
        $edit_row = $row;
      }

      if (!$row['small_text'])
      {
        $row['full_text'] = strip_tags ($row['full_text']);
        $row['small_text'] = preg_replace ('/^(.{100,120})\\s.*/', '' . '$1...', $row['full_text']);
      }

      $row['small_text'] = preg_replace ('/\\n/', '<br>', $row['small_text']);
      echo '<tr><td ';
      echo ($row['sponsored'] ? 'bgcolor=#FEEEDD' : '');
      echo '>
  <b>';
      echo $row['title'];
      echo '</b> ';
      echo ($row['expired'] ? '<font color=red><b>expired</b></font>' : '');
      echo '<br>
  ';
      echo $row['small_text'];
      echo '<br>
  ';
      echo '<s';
      echo 'mall><i>';
      echo $row['d'];
      echo '</i></small>
  <a href="?a=news&action=edit&id=';
      echo $row['id'];
      echo '&page=';
      echo $page;
      echo '#editform">[EDIT]</a> 
  <a href="?a=news&action=delete&id=';
      echo $row['id'];
      echo '&page=';
      echo $page;
      echo '" onclick="return confirm(\'Do you really want to delete this new?\')">[REMOVE]</a> 
</td></tr>
';
    }

    echo '</table>
<center>
';
    if (1 < $colpages)
    {
      if (1 < $page)
      {
        echo ' <a href="?a=news&page=';
        echo $page - 1;
        echo '">&lt;&lt;</a> ';
      }

      for ($i = 1; $i <= $colpages; ++$i)
      {
        if ($i == $page)
        {
          echo ' <b>';
          echo $i;
          echo '</b> ';
          continue;
        }
        else
        {
          echo ' <a href="?a=news&page=';
          echo $i;
          echo '">';
          echo $i;
          echo '</a> ';
          continue;
        }
      }

      if ($page < $colpages)
      {
        echo ' <a href="?a=news&page=';
        echo $page + 1;
        echo '">&gt;&gt;</a> ';
      }
    }

    echo '</center>
';
  }
  else
  {
    echo start_info_table ('100%');
    echo 'Here you can manage your list news.<br>
When you add news it will appear on the index page (if you enable \'News Section\' in the Sections Management)<br>
Small text will appear on the Index page. If you omit the Small Text then the system will show first 100-120 characters of your Full Text.<br>
If you omit the Full Text then the system will show Small Text on all the news page.
';
    echo end_info_table ();
  }

  echo '<br><br><a name="editform"></a>
<form method=post>
<input type=hidden name=a value=news>
';
  if ($edit_row)
  {
    echo '<input type=hidden name=action value=edit>
<input type=hidden name=save value=1>
<input type=hidden name=id value="';
    echo $edit_row['id'];
    echo '">
';
  }
  else
  {
    echo '<input type=hidden name=action value=add>
';
  }

  echo '<input type=hidden name=page value=';
  echo $page;
  echo '>
<table cellspacing=0 cellpadding=2 border=0>
<tr>
 <td>Sponsored:</td>
 <td>
   ';
  echo '<s';
  echo 'elect name="sponsored" class=inpts>
     <option value="0" ';
  echo ($edit_row['sponsored'] == 0 ? 'selected' : '');
  echo '>No</option>
     <option value="1" ';
  echo ($edit_row['sponsored'] == 1 ? 'selected' : '');
  echo '>Yes</option>
   </select>
 </td>
</tr>
<tr>
 <td>Expires after:</td>
 <td><input type="text" name="expiration" value="';
  echo ($edit_row['expiration'] ? $edit_row['expiration'] : 0);
  echo '" class=inpts> days</td>
</tr>
<tr>
 <td colspan=2>Title</td>
</tr>
<tr>
 <td colspan=2>
  <input type="text" name="title" value="';
  echo $edit_row['title'];
  echo '" class=inpts size=100>
 </td>
</tr>
<tr>
 <td colspan=2>Small Text</td>
</tr>
<tr>
 <td colspan=2>
  <textarea name=small_text class=inpts cols=100 rows=3>';
  echo $edit_row['small_text'];
  echo '</textarea>
 </td>
</tr>
<tr>
 <td colspan=2>Full Text</td>
</tr>
<tr>
 <td colspan=2>
  <textarea name=full_text class=inpts cols=100 rows=5>';
  echo $edit_row['full_text'];
  echo '</textarea>
 </td>
</tr>
<tr>
 <td colspan=2><input type=submit value="';
  echo (!$edit_row ? 'Add' : 'Edit');
  echo '" class=sbmt></td>
</tr></table>
</form>

';
?>
