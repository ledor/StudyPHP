{literal}
<script type="text/javascript">
var IE=(!this.isOpera&&document.all&&navigator.userAgent.match(/msie/gi))?true:false;
if (window.XMLHttpRequest) {
document.write("<DIV id=bottom_bar18><DIV id=goto_top18><A href='javascript:scroll(0,0);'><IMG alt='Go to top' border=0 src='images/goto_top.png'></A></DIV><DIV class=menu_floating><UL>  <LI><A href='?=home'><IMG alt='>>' border=0  src='images/bar_home.png'> Home</A> </LI><LI><A ><IMG alt='>>'   src='images/bar_programs.png'> Programs</A>  <UL> <LI><A href='?a=new'>New Programs</A> </LI> {/literal}{section name=f1 loop=$groups_nav} <LI><A href='?type={$groups_nav[f1].id}'>{$groups_nav[f1].nav_name}</A></LI>{/section} {literal}</UL></LI><LI><A ><IMG alt='' src='images/bar_ads.png'> Advertise with us<!--[if gte IE 7]><!--></A><!--<![endif]--><!--[if lte IE 6]><table><tr><td><![endif]--> <UL>{/literal}{section name=f2 loop=$groups_nav} <LI><A href='?a=add&type={$groups_nav[f2].id}'>Add {$groups_nav[f2].nav_name}</A></LI>{/section}{literal}<LI><A href='?a=advertise'>Add Banners/Text Ads</A> </LI>    </UL><!--[if lte IE 6]></td></tr></table></a><![endif]--></LI><LI><A ><IMG alt='>>'  src='images/bar_support.png'>   Contact Us<!--[if gte IE 7]><!--></A><!--<![endif]--><!--[if lte IE 6]><table><tr><td>	<![endif]--> <UL> <LI><A href='?a=support'>Contact Form</A> </LI><LI><A href='mailto:earntalks.com@gmail.com'>Mail Us</A> </LI><LI><A href='ymsgr:sendIM?freelancer0723@yahoo.com'>Online Support</A> </LI></UL></LI><LI><A><IMG alt=''  src='images/bar_news.png'> Updates</A><UL>  <LI><A href='?a=news'>News</A></LI> </UL> </LI><LI><A ><IMG alt='' src='images/bar_rcb.png'> RCB</A><UL><LI><A href='?a=allrcb'>Programs with RCB</A> </LI><LI><A href='?a=allrcbrequest'>RCB Requests</A> </LI></UL></LI></UL></DIV></DIV>");}
</script>
{/literal}

{literal}
<script type="text/javascript">
function MM_swapImgRestore(){
var C,A,B=document.MM_sr;
for(C=0;B&&C<B.length&&(A=B[C])&&A.oSrc;C++){
A.src=A.oSrc }
}
function MM_preloadimages(){
var D=document;
if(D.images){
if(!D.MM_p){
D.MM_p=new Array()
}
var C,B=D.MM_p.length,A=MM_preloadimages.arguments;
for(C=0;C<A.length;C++){
if(A[C].indexOf("#")!=0){
D.MM_p[B]=new Image;
D.MM_p[B++].src=A[C]}}}
}
function MM_findObj(E,D){
var C,B,A;
if(!D){D=document}
if((C=E.indexOf("?"))>0&&parent.frames.length){
D=parent.frames[E.substring(C+1)].document;
E=E.substring(0,C)}
if(!(A=D[E])&&D.all){A=D.all[E]}
for(B=0;!A&&B<D.forms.length;B++){A=D.forms[B][E]}
for(B=0;!A&&D.layers&&B<D.layers.length;B++){A=MM_findObj(E,D.layers[B].document)}if(!A&&D.getElementById){A=D.getElementById(E)}return A}
function MM_swapImage(){
var D,C=0,A,B=MM_swapImage.arguments;
document.MM_sr=new Array;
for(D=0;D<(B.length-2);D+=3){
if((A=MM_findObj(B[D]))!=null){
document.MM_sr[C++]=A;
if(!A.oSrc){A.oSrc=A.src}
A.src=B[D+2]}}
}
function MM_preloadImages(){
var D=document;
if(D.images){
if(!D.MM_p){D.MM_p=new Array()}
var C,B=D.MM_p.length,A=MM_preloadImages.arguments;
for(C=0;C<A.length;C++){
if(A[C].indexOf("#")!=0){
D.MM_p[B]=new Image;
D.MM_p[B++].src=A[C];
}}}}
</script>
<script src="AC_RunActiveContent.js" type="text/javascript"></script>
{/literal}