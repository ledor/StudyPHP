<?php /* Smarty version 2.6.2, created on 2011-12-23 12:52:07
         compiled from advertise.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<table width=100% border=0 cellspacing=0 cellpadding=0><tr><td valign="middle"><div class="maintitle1" align="left"><img src="images/t_pl.png" width=11 height=24 align="left" /><div class="maintitle_text" align="left"><div align="left">Advertise</div></div></div></td></tr><tr><td class="main_line"><img src="images/spacer.gif" height=3 /></td></tr>
<tr><td><div class="list_side"><table width=100% border=0 cellspacing=0 cellpadding=0><tr><td valign="top"><div class="list_info">

<TABLE cellSpacing=0 cellPadding=0 width="100%" border=0>
  <TBODY>
  <TR vAlign=top>
    <TD style="PADDING-RIGHT: 0px; PADDING-LEFT: 0px">
 
      <DIV style="BACKGROUND: #f5f5f5"><IMG height=5 alt="" 
      src="images/1x1.gif" 
      width=1 border=0></DIV>
      <TABLE cellSpacing=0 cellPadding=0 width="100%" bgColor=#f5f5f5 
        border=0><TBODY>
        <TR>
          <TD bgcolor="#A60000">
            <TABLE cellSpacing=0 cellPadding=0 width=100% align=center 
              border=0><TBODY>
              <TR>
                <TD bgcolor="#A60000">
                  <DIV style="BACKGROUND: #f5f5f5; PADDING-TOP: 5px" 
                  align=center valign="middle">
					<a class="tablink" id="link0" onfocus="this.blur()" href="index.php?a=add&type=1">
					<font color="#CC0000">Premium listing</font></a><font color="#CC0000">
					</font>
					<a class="tablink" id="link1" onfocus="this.blur()" href="index.php?a=add&type=2">
					<font color="#CC0000">Normal listing</font></a><font color="#CC0000">
					</font>
					<a class="tablink" id="link2" onfocus="this.blur()" href="index.php?a=add&type=4">
					<font color="#CC0000">Autosurf listing</font></a><font color="#CC0000">
					</font>
					<a class="tablink" id="link4" onfocus="this.blur()" href="index.php?a=add&type=3">
					<font color="#CC0000">Trial listing</font></a><font color="#CC0000">
					<a class="tablink" id="link4" onfocus="this.blur()" href="index.php?a=add&type=5">
					<font color="#CC0000">PTC listing</font></a><font color="#CC0000">
				</font>        </DIV></TD></TR></TBODY></TABLE></TD></TR></TBODY></TABLE><!-- /tabs -->
      <DIV class=tab id=contentblock1><A name=target1></A>
      <TABLE 
      style="BORDER-TOP: #fdf4d8 4px solid; BORDER-BOTTOM: #fdf4d8 8px solid" 
      cellSpacing=0 cellPadding=5 width="100%" border=0>
        <TBODY>
        <TR>
          <TD>
            <TABLE cellSpacing=0 cellPadding=8 width="100%" border=0>
              <TBODY>
              <TR vAlign=top>
                <TD width="100%">
                  <DIV class=h3><B><font size="2">Site Listing</font></B></DIV><br>
				
<table cellspacing=0 cellpadding=2 border=0 width=100%>

<tr>
 <td>
   <p><font color="#CC0000"><strong><?php echo $this->_tpl_vars['settings']['site_name']; ?>
</strong> is a listing 
	of Autosurfs programs.</font></p>
   <p>You can add a new <strong>AutoSurf</strong> or <strong>HYIP</strong> or <strong>PTC</strong> program if you are 
	it's administrator or owner.</p>
   <p>Do not submit a referral url.</p>
   <p>Write an e-mail in your program domain.</p>
   <p>After approving your service it will be added in the list.</p>
   <p>We have the right to refuse your program listing.</p>
   <p>If you submit to any type of advertising option and your program will be 
	not paying to investors, we have the right to disable your advertising.</p>
   <p>You cannot rate your own program. If our system will find these votes 
	program will be blacklisted. To get more proper votes you can place our 
	button in most visible place on your site and ask your members for voting 
	every 24 hours.<br />
   </p>
<p>After entering and submitting the <strong>Add Program Form</strong>, you are requested to make your Monitor Fees + Listing Fees through LibertyReserve (Automatic) , After the payment successful your listing which you have submitted will be approved automatic.We will reinvest into your program and start monitor ASAP!<br>
<br></p>

   <table width="100%" border="0" align="center" cellpadding="0" cellspacing="1" class="adblack">
     <tr class=title2>
       <td align="center" bgcolor="#CC0000"><font color="#FFFFFF"><strong>
		Listing Location</strong></font></td>
       <td align="center" bgcolor="#CC0000"><font color="#FFFFFF"><strong>Total 
		Fees = Monitor Fees + Listing Fees</strong></font></td>
       <td align="center" bgcolor="#CC0000"><font color="#FFFFFF"><strong>Add 
		Your Program now! </strong>
		</font></td>
     </tr>

     <tr class="adlight">
       <td align="left" bgcolor="#F3F3F3">Premium Listing</td>
       <td align="left" bgcolor="#F3F3F3">$<?php echo $this->_tpl_vars['settings']['premiummonitorfees']+$this->_tpl_vars['settings']['premiumlistingfees']; ?>
<font color="#FF0000">($<?php echo $this->_tpl_vars['settings']['premiummonitorfees']; ?>
+$<?php echo $this->_tpl_vars['settings']['premiumlistingfees']; ?>
)*</font></td>
       <td align="left" bgcolor="#F3F3F3"><a href="index.php?a=add&amp;type=1">Add to the 
		Premium listing </a></td>
     </tr>
     <tr class="adlight">
       <td align="left">Normal Listing </td>
       <td align="left">$<?php echo $this->_tpl_vars['settings']['normalmonitorfees']+$this->_tpl_vars['settings']['normallistingfees']; ?>
<font color="#FF0000">($<?php echo $this->_tpl_vars['settings']['normalmonitorfees']; ?>
+$<?php echo $this->_tpl_vars['settings']['normallistingfees']; ?>
)**</font></td>
       <td align="left"><a href="index.php?a=add&amp;type=2">Add to the Normal listing</a></td>
     </tr>
     <tr class="adlight">
       <td align="left" bgcolor="#F3F3F3"> Autosurf Listing </td>
       <td align="left" bgcolor="#F3F3F3">$<?php echo $this->_tpl_vars['settings']['autosurfmonitorfees']+$this->_tpl_vars['settings']['autosurflistingfees']; ?>
<font color="#FF0000">($<?php echo $this->_tpl_vars['settings']['autosurfmonitorfees']; ?>
+$<?php echo $this->_tpl_vars['settings']['autosurflistingfees']; ?>
)***</font></td>
       <td align="left" bgcolor="#F3F3F3"><a href="index.php?a=add&amp;type=2">Add to the 
		Autosurf listing</a></td>
     </tr>
     <tr class="adlight">
       <td align="left">Trial Listing </td>
       <td align="left">$<?php echo $this->_tpl_vars['settings']['trialmonitorfees']+$this->_tpl_vars['settings']['triallistingfees']; ?>
<font color="#FF0000">($<?php echo $this->_tpl_vars['settings']['trialmonitorfees']; ?>
+$<?php echo $this->_tpl_vars['settings']['triallistingfees']; ?>
)****</font></td>
       <td align="left"><a href="index.php?a=add&amp;type=3">Add to the Trial listing</a></td>
     </tr>
     <tr class="adlight">
       <td align="left">PTC Listing </td>
       <td align="left">$<?php echo $this->_tpl_vars['settings']['trialmonitorfees']+$this->_tpl_vars['settings']['triallistingfees']; ?>
<font color="#FF0000">($<?php echo $this->_tpl_vars['settings']['trialmonitorfees']; ?>
+$<?php echo $this->_tpl_vars['settings']['triallistingfees']; ?>
)*****</font></td>
       <td align="left"><a href="index.php?a=add&amp;type=5">Add to the PTC listing</a></td>
     </tr>
       <td colspan="5">

 <font color="#FF0000"><br />
      	*</font><font color="#FF0000">$<?php echo $this->_tpl_vars['settings']['premiummonitorfees']; ?>
</font>will 
		be reinvested into your program for the monitoring.<font color="#FF0000">$<?php echo $this->_tpl_vars['settings']['premiumlistingfees']; ?>
 
		fee.</font> <strong>If the minimum deposit of your program is higher 
		than $<?php echo $this->_tpl_vars['settings']['premiummonitorfees']+$this->_tpl_vars['settings']['premiumlistingfees']; ?>
you have to spend the minimum amount.</strong><br />
      <br />
      <font color="#FF0000">**</font><font color="#FF0000">$<?php echo $this->_tpl_vars['settings']['normalmonitorfees']; ?>
</font> 
		will be reinvested into your program for the monitoring.<font color="#FF0000">$<?php echo $this->_tpl_vars['settings']['normallistingfees']; ?>
 
		fee.</font> <strong>If the minimum deposit of your program is higher 
		than $<?php echo $this->_tpl_vars['settings']['normalmonitorfees']+$this->_tpl_vars['settings']['normallistingfees']; ?>
 you have to spend the minimum amount.</strong>After 
		we get 80% of our deposit we will consider your listing advancement to 
		the 'Premium' section.<br />
      <br />
      <font color="#FF0000">***$<?php echo $this->_tpl_vars['settings']['autosurfmonitorfees']; ?>
</font> will be 
		reinvested into your program for the monitoring.<font color="#FF0000">$<?php echo $this->_tpl_vars['settings']['autosurflistingfees']; ?>
 
		fee</font>. <strong>If the minimum deposit of your program is higher 
		than $<?php echo $this->_tpl_vars['settings']['autosurfmonitorfees']+$this->_tpl_vars['settings']['autosurflistingfees']; ?>
 you have to spend the minimum amount.</strong><br />
      <br />
      	<font color="#FF0000">****$<?php echo $this->_tpl_vars['settings']['trialmonitorfees']; ?>
</font> will be reinvested into your 
		program for the monitoring.<font color="#FF0000">$<?php echo $this->_tpl_vars['settings']['triallistingfees']; ?>
 
		fee.</font> <strong>If the minimum deposit of your program is higher 
		than $<?php echo $this->_tpl_vars['settings']['trialmonitorfees']+$this->_tpl_vars['settings']['triallistingfees']; ?>
 you have to spend the minimum amount.</strong>After 
		we get 80% of our deposit we will consider your listing advancement to 
		the 'Normal' section.<br />
       <br />
      	<font color="#FF0000">****$<?php echo $this->_tpl_vars['settings']['ptcmonitorfees']; ?>
</font> will be reinvested into your 
		program for the monitoring.<font color="#FF0000">$<?php echo $this->_tpl_vars['settings']['ptclistingfees']; ?>
 
		fee.</font> <strong>If the minimum deposit of your program is higher 
		than $<?php echo $this->_tpl_vars['settings']['ptcmonitorfees']+$this->_tpl_vars['settings']['ptclistingfees']; ?>
 you have to spend the minimum amount.</strong><br />
     <br /></td>
     </tr>
   </table>

     <br>
   </p>
	<div align="center"><br />
   </div>
<br>
                  <DIV class=h3><B><font size="2"><a name=MiniBannerads></a><a name=topRotatingBannerads></a><a name=RotatingBannerads></a><a name="normalbannerads" id="normalbannerads"></a><a name="textads" id="textads"></a></font>
					<font size="3"><font color="#ff0000">Advertise On <?php echo $this->_tpl_vars['settings']['site_name']; ?>
 :</font></font></B></DIV>
	<p> </td>
</tr>

<tr>
 <td><p><?php echo $this->_tpl_vars['settings']['site_name']; ?>
 currently offers 5 types of advertising:</p>
   <p>1)<font color="#FF0000"><strong>Top Rotating banner ads</strong></font> <strong>
	at TOP of all our pages (Rotating) </strong> only <font color="#FF0000"><strong>
	$<?php if (showtoprotatingmin ( )): ?> <?php endif; ?> /week</strong></font><br />
     <br />
     2)<font color="#FF0000"><strong>Rotating banner ads</strong></font> <strong>
	at all our pages (Rotating) </strong> only <font color="#FF0000"><strong>
	$<?php if (showrotatingmin ( )): ?> <?php endif; ?> /week</strong></font><br />
     <br />
     3)<font color="#FF0000"><strong>Non-rotating SPECIAL banner ads</strong> <em>
	with text description</em> </font> <strong>at TOP of all our pages only 
	start from </strong> <font color="#FF0000"><strong> $<?php if (showspecialmin ( )): ?> 
	<?php endif; ?>/Week</strong></font>,The higher price the higher position.<br />
<br />
   4)<font color="#FF0000"><strong>Non-rotating normal banner ads</strong> <em>
	with text description</em> </font> <strong>at all our pages only start from </strong> <font color="#FF0000"><strong> 
	$<?php if (shownormalmin ( )): ?> <?php endif; ?>/Week</strong></font>,The higher price the higher 
	position.</p>
   <p>5)<span class="title"><strong><font color="#FF0000">Text Ads(250 
	characters or less) or Mini Banners (less than 125*125)</font> at all our 
	pages</strong> only start from <font color="#FF0000"><strong>$<?php if (showminimin ( )): ?> <?php endif; ?>/Week</strong></font>. </span></p>
   
   <p>
    <?php if (showpayadform ( )):  endif; ?></p></td>
</tr>
<!--<tr>
 <th class=title><a name=specialbannerads></a>Special Banner Ads</th>
</tr>
<tr>
 <td><p>Place your <font color="#FF0000">banner ads with Description </font> <strong>at  all our pages</strong> <font color="#FF0000"><strong> $<?php if (showspecialmin ( )):  endif; ?>/Week</strong></font>,The higher price the higher position.<br />
     <br />
   
   <font color="#FF3300">Send us Mail or Use the <a href="/?a=support" target="_blank">online Contact Form</a> include the following   information:<br />
   <br />
   Banner url <br />
   Destination url<br />
   Description (<strong>no more than 100 characters</strong>)<br />
     Batch id </font><br />
       <br />
     Attention!<br />
          If your game or HYIP site is found reported as scam on   more than one listing site for more than one day we reserve the right to decline   or remove your listing, banner ad or text ad without notice and refund! <br />
       <br>
       <br>
     </p>
   </td>
</tr>-->
<tr>
 <th class=title><a name=logo></a>Links Exchange</th>

</tr>
<tr>
 <td><div align="center">
   <p>Place our logo to your site (simply copy and paste this html code to your html): <br />  
     <textarea name="logo_txt" wrap="physical" cols="50" rows="4" onmouseover="this.select()">
<a href="<?php echo $this->_tpl_vars['settings']['site_url']; ?>
"><img src="/<?php echo $this->_tpl_vars['settings']['site_logo_url']; ?>
" alt="<?php echo $this->_tpl_vars['settings']['site_url_alt']; ?>
" border="0" width="120" height="120"></a>
</textarea>
   </p>
   <p><img src="/<?php echo $this->_tpl_vars['settings']['site_logo_url']; ?>
" alt="<?php echo $this->_tpl_vars['settings']['site_url_alt']; ?>
" width="120" height="120" /><br>
         <br>
     </p>

                  </TD></TR>
              </TBODY></TABLE></TD></TR></TBODY></TABLE></DIV></TD></TR></TBODY></TABLE>

</div></td></tr></table>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
