<?

{

  $q = 'select * from hl_rcbrate where used=1 and onhold<1 group by program_id';   
  if (!($sth = mysql_query ($q)))
  {
    print mysql_error ();
    ;
  }

  $count_all = mysql_num_rows($sth);
  $page = $frm['page'];

  $onpage = 30;
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




    $n_info = array ();
    $r_info = array ();

     $filters = 'replace(replace(replace(replace(name, " ", ""),",",""),"*",""),".","") as sitename';

     $q='SELECT '. $filters. ',B.name, B.id FROM hl_rcbrate AS A, hl_listings AS B WHERE B.group_id<6 and used =1 and onhold<1 AND program_id = id GROUP BY name ORDER BY textid limit ' . $from . ', ' . $onpage;

  $sth = mysql_query ($q);
    while ($row = mysql_fetch_array ($sth))
     {
     $id = $row['id'];
     $name = $row['name'];

     array_push ($n_info, $row);

     $smarty->assign ('n_info', $n_info);  
        
    $q2='SELECT * FROM hl_rcbrate WHERE used =1 AND program_id ='. $id. ' ORDER BY textid ';
    $sth2 = mysql_query ($q2);
    while ($row2 = mysql_fetch_array ($sth2))
     {
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


  $smarty->display ('allrcb.tpl');




}
?>