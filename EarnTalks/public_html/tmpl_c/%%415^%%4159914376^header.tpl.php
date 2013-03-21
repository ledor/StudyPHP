<?php /* Smarty version 2.6.2, created on 2011-12-30 05:29:18
         compiled from header.tpl */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head><meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<meta name="keywords" content="hyip & autosurfs monitor, hyip & autosurfsmonitor, hyip & surfsmonitor, hyip & manualsurfs, hyip & manual surf, surf, autosurfs, surfing, monitor, monitoring, listing, rating, polling, listings, PTC sites, GPT sites">
<meta name="Description" content="Hyip & AutoSurf Monitor,Hyip & AutoSurf Listing,Hyip & AutoSurf Rating,Hyip & AutoSurf Voting,Hyip & AutoSurf Ranking,Surf the best,PTC/GPT Listing,Hyip & Autosurf monitoring and listing site - EarnTalks.com">  
<title><?php echo $this->_tpl_vars['settings']['site_name']; ?>
 - Hyip &amp; Autosurf/PTC Monitor,Hyip &amp; Autosurf/PTC Listing Site .</title>
<link href="style.css" rel="stylesheet" type="text/css">
<LINK rel=stylesheet type=text/css href="rte_css.css">
<STYLE type=text/css media=all>@import url(css_18.css);
</STYLE>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "floating_toolbar.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</head>
<body>
<center>
<table width=950 border=0 cellspacing=0 cellpadding=0>
<tr><td><table width=100% border=0 cellspacing=0 cellpadding=0>
<tr><td width="42%" class="header_top">&nbsp;</td>
  <td width="58%" class="header_top">&nbsp;</td>
</tr>
<tr><td colspan="2"><table width=100% border=0 cellspacing=0 cellpadding=0>
<tr><td width=400 align="right" background="images/header_logo.png">
<div class="header_line">
  <h1>&nbsp;</h1>
  <br>
  <br><br><br></div></td>

<td width="509" valign="bottom" background="images/header_logo.png" class="but_bg"><div class="butbox"><div align="right">
<?php if (showtoprotatingbanners ( )):  endif; ?></div>

<br>
<table width=100% border=0 cellspacing=0 cellpadding=0><tr><td align="center"><a href="?a=home" onmouseover="MM_swapImage('home','','images/home1.gif',1)" onmouseout=MM_swapImgRestore()><img name="home" src="images/home0.gif" width=51 height=30 border=0 class="butx"></a></td><td align="center"><a href="?a=news" onmouseover="MM_swapImage('news','','images/news1.gif',1)" onmouseout=MM_swapImgRestore()><img name="news" src="images/news0.gif" width=50 height=30 border=0 class="butx" /></a></td><td align="center"><a href="?a=advertise" onmouseover="MM_swapImage('advertising','','images/advertising1.gif',1)" onmouseout=MM_swapImgRestore()><img name="advertising" src="images/advertising0.gif" width=113 height=30 border=0 class="butx" /></a></td><td align="center"><a href="?a=support" onmouseover="MM_swapImage('support','','images/support1.gif',1)" onmouseout=MM_swapImgRestore()><img name="support" src="images/support0.gif" width=82 height=30 border=0 class="butx" /></a></td></tr></table></div></td><td valign="bottom" width=41><img src="images/up.gif" width=41 height=30></td></tr></table></td></tr>

<tr><td height="30" colspan="2" align="center"><p><a href="?a=advertise"><b>Add</b></a> | <a href="?a=home"><b>All</b></a> | <a href="?a=new"><b>New</b></a> | 
<?php if (isset($this->_sections['g'])) unset($this->_sections['g']);
$this->_sections['g']['name'] = 'g';
$this->_sections['g']['loop'] = is_array($_loop=$this->_tpl_vars['groups_nav']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['g']['show'] = true;
$this->_sections['g']['max'] = $this->_sections['g']['loop'];
$this->_sections['g']['step'] = 1;
$this->_sections['g']['start'] = $this->_sections['g']['step'] > 0 ? 0 : $this->_sections['g']['loop']-1;
if ($this->_sections['g']['show']) {
    $this->_sections['g']['total'] = $this->_sections['g']['loop'];
    if ($this->_sections['g']['total'] == 0)
        $this->_sections['g']['show'] = false;
} else
    $this->_sections['g']['total'] = 0;
if ($this->_sections['g']['show']):

            for ($this->_sections['g']['index'] = $this->_sections['g']['start'], $this->_sections['g']['iteration'] = 1;
                 $this->_sections['g']['iteration'] <= $this->_sections['g']['total'];
                 $this->_sections['g']['index'] += $this->_sections['g']['step'], $this->_sections['g']['iteration']++):
$this->_sections['g']['rownum'] = $this->_sections['g']['iteration'];
$this->_sections['g']['index_prev'] = $this->_sections['g']['index'] - $this->_sections['g']['step'];
$this->_sections['g']['index_next'] = $this->_sections['g']['index'] + $this->_sections['g']['step'];
$this->_sections['g']['first']      = ($this->_sections['g']['iteration'] == 1);
$this->_sections['g']['last']       = ($this->_sections['g']['iteration'] == $this->_sections['g']['total']);
?>
 <a href="?type=<?php echo $this->_tpl_vars['groups_nav'][$this->_sections['g']['index']]['id']; ?>
"><b><?php echo $this->_tpl_vars['groups_nav'][$this->_sections['g']['index']]['nav_name']; ?>
 List</b></a> <?php if ($this->_sections['g']['last'] != 1): ?> | <?php endif;  endfor; endif; ?>
</p></td></tr>

<tr><td colspan="2"><div align="center" class="top_banner">
<?php if (showspecialbanners ( )):  endif; ?>
</div></td></tr>


</table>
</td></tr></table>

<table width=950 border=0 cellspacing=0 cellpadding=0>
<tr><td valign="top">
<table width=100% border=0 cellspacing=0 cellpadding=0>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "lsidebar.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<td valign="top"><div class="main" class="top_banner">


<table width=100% border=0 cellspacing=0 cellpadding=0>
<tr><td valign="top" align="center" >			
			<!-- banner ads: Start -->
			<?php if (shownormalbanners ( )): ?>
			<?php endif; ?>			
			<!--Banner ADS: End-->
			</td></tr>
<tr><td>&nbsp;</td></tr>
</table>
