<?

{

  $q = 'select * from hl_rcbreport group by date_format(date,"%Y-%m-%d")';   
  if (!($sth = mysql_query ($q)))
  {
    print mysql_error ();
    ;
  }

  $count_all = mysql_num_rows($sth);
  $page = $frm['page'];

  $onpage = 10;
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




    $q='SELECT round(sum(rcb),2) as paid from hl_rcbreport where status like "%paid%"';
    $sth = mysql_query ($q);
    $row = mysql_fetch_array ($sth);
    $rcbpaid = $row['paid'];
    $smarty->assign ('rcbpaid', $rcbpaid);
  
    $q='SELECT round(sum(rcb),2) as waiting from hl_rcbreport where status like "%wait%"';
    $sth = mysql_query ($q);
    $row = mysql_fetch_array ($sth);
    $rcbwaiting = $row['waiting'];
    if (!$rcbwaiting)
      {
      $rcbwaiting = 0;
      }
    $smarty->assign ('rcbwaiting', $rcbwaiting);


    $n_info = array ();
    $r_info = array ();

        $q='SELECT *, date_format(date,"%Y-%m-%d") as rcb_date  FROM hl_rcbreport group by rcb_date order by rcb_date desc  limit ' . $from . ', ' . $onpage;


    $sth = mysql_query ($q);
    while ($row = mysql_fetch_array ($sth))
     {
     $rcb_date = $row['rcb_date'];
     array_push ($n_info, $row);
     $smarty->assign ('n_info', $n_info);     
    $q2='SELECT A.*,B.name FROM hl_rcbreport as A,hl_listings as B where A.lid=B.id and date_format(date,"%Y-%m-%d") =  "'.$rcb_date.'" order by A.date desc ';
    $sth2 = mysql_query ($q2);
    while ($row2 = mysql_fetch_array ($sth2))
     {
     if ($row2['username'])
          {
          $lu = strlen($row2['username']);
             if ($lu>10)
               {
               $lu = 10;
               } 
             if ($lu>3)
              {
               $row2['username'] = substr($row2['username'],0,$lu-3).'***';
              }
              else
              {
              $row2['username'] = substr($row2['username'],0,$lu).'***';
              }
           }
     if ($row2['ecno'])
             {
             $le = strlen($row2['ecno']);
              if ($le>10)
              {
               $le = 10;
              } 
             $row2['ecno'] = substr($row2['ecno'],0,$le-3).'***';
            }
   
          $row2['time'] = substr($row2['date'],11,8);
          array_push ($r_info, $row2);
         $smarty->assign ('r_info', $r_info);
      }    

     }    

  $pages = array ();
  for ($i = 1; $i <= $colpages; ++$i)
  {
    $apage = array ();
    $apage['page'] = $i;
    $apage['current'] = ($i == $page ? 1 : 0);
    array_push ($pages, $apage);
  }

  $smarty->assign ('pages', $pages);
  $smarty->assign ('colpages', $colpages);
  $smarty->assign ('current_page', $page);
  if (1 < $page)
  {
    $smarty->assign ('prev_page', $page - 1);
  }

  if ($page < $colpages)
  {
    $smarty->assign ('next_page', $page + 1);
  }



  $smarty->display ('allrcbrequest.tpl');


}
?>