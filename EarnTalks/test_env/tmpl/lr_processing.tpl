{include file="header.tpl"}



{if $say eq 'notsuccess'}
<h3>Sorry! Payment is not successful:</h3>
Your payment is not successful!<br>

If you need some help please use our online contact form:<a href="?a=support">CLICK HERE!</a><br />
<br>

{else}
{if $say eq 'success'}
<h3>Congratulations!</h3>
<p>Your program has be successfully added and approved.<br />
  You Payment ${$amount} from LR account #{$account} batch #{$batch} has be successfully tranfered to our LR Account!</p>
<p>A email has been sent to you email {$email} . <br />
  <br />
  Your MONITOR CODE can be found at : <br />
  <a href={$settings.site_url}?a=details&lid={$lid}>CLICK HERE TO GET YOU MONITOR CODE!</a><br />
  <br />
  You can also buy some advertises(banners or Text) ,more infomation at: <br />
  
  <a href={$settings.site_url}?a=advertise>{$settings.site_url}?a=advertise</a>
  
  <br />
  {/if}
 {/if}
  
  
{include file="footer.tpl"} </p>
