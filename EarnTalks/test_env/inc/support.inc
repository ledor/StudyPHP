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


  if ($frm['action'] == 'send')
  {
    $from = $frm['email'];
    $message = $settings['site_name'] . ' Support request from ' . date ('l dS of F Y h:i:s A') . '

---------------------------------------------------------------
';
    $message .= $frm['message'];
    $message .= '

---------------------------------------------------------------
';
    $message .= 'User Additional Info :';
    $message .= 'User Name : ' . $frm['name'] . '';
    $message .= 'E-Mail    : ' . $frm['email'] . '';
    $message .= 'IP Address: ' . $_SERVER['REMOTE_ADDR'] . '';
    $message .= 'Language  : ' . $_SERVER['HTTP_ACCEPT_LANGUAGE'] . '';
    mail ($settings['admin_email'], $settings['site_name'] . ' Support Request', $message, '' . 'From: ' . $from);
    header ('Location: ?a=support&say=send');
    exit ();
  }
  
if ($frm['action'] == 'ad')
  {
	if ($frm['ad_type']=='0'){
		$ad_type='Rotating banner AD';
	}
	else{
		if ($frm['ad_type']=='1'){
			$ad_type='Normal banner AD';
		}
		else{
			if ($frm['ad_type']=='2'){
			$ad_type='Text AD';
			}
			else{
			$ad_type='Mini Banner AD';
			}
		}		
	}
	

    $from = $frm['user_name'];
    $message = $settings['site_name'] . ' AD request from ' . date ('l dS of F Y h:i:s A') . '

--------------------------------------------------------------
';
   
    $message .= 'Additional Info :
	';
    $message .= 'E-Mail    : ' . $frm['user_name'] . '
	';
    $message .= 'IP Address: ' . $_SERVER['REMOTE_ADDR'] . '
	';
    $message .= 'Language  : ' . $_SERVER['HTTP_ACCEPT_LANGUAGE'] . '
	';
	$message .=	'Ad Type :' . $ad_type .'
	';
	$message .=	'Ad Duration :' . $frm['ad_time'] . $frm['ad_time_type'].'
	';
	$message .=	'Target Website Url :' . $frm['ad_website_url'] .'
	';
	$message .=	'Advertiser Email Address :' . $frm['user_name'] .'
	';
	$message .=	'Banner Ad Url :' . $frm['ad_banner_url'] .'
	';
	$message .=	'Alternate Text for Banner Ad :' . $frm['ad_alt_text'] .'
	';
	$message .=	'Heading for Text Ad :' . $frm['ad_heading'] .'
	';
	$message .=	'Text for Text Ad 
Description for Normal banner AD:' . $frm['ad_text'] .'
';
	$message .=	'Pay Fees :' . $frm['total_price1'] .'$(USD)';
	$message .= '

---------------------------------------------------------------
';

    mail ($settings['admin_email'], $settings['site_name'] . ' Support Request', $message, '' . 'From: ' . $from);
    header ('Location: ?a=support&say=pay&fee='.$frm['total_price1'].'&email='.$frm['user_name'].'&ip='.$_SERVER['REMOTE_ADDR']);
    exit ();
  }

  $smarty->assign ('ip',$_SERVER['REMOTE_ADDR']);
  $smarty->assign ('email',$frm['email']);
  $smarty->assign ('fee',$frm['fee']);
  $smarty->assign ('say', $frm['say']);
  $smarty->display ('support.tpl');
?>
