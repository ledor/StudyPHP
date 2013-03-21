<?php /* Smarty version 2.6.2, created on 2011-12-30 05:29:18
         compiled from floating_toolbar.tpl */ ?>
<?php echo '
<script type="text/javascript">
var IE=(!this.isOpera&&document.all&&navigator.userAgent.match(/msie/gi))?true:false;
if (window.XMLHttpRequest) {
document.write("<DIV id=bottom_bar18><DIV id=goto_top18><A href=\'javascript:scroll(0,0);\'><IMG alt=\'Go to top\' border=0 src=\'images/goto_top.png\'></A></DIV><DIV class=menu_floating><UL>  <LI><A href=\'?=home\'><IMG alt=\'>>\' border=0  src=\'images/bar_home.png\'> Home</A> </LI><LI><A ><IMG alt=\'>>\'   src=\'images/bar_programs.png\'> Programs</A>  <UL> <LI><A href=\'?a=new\'>New Programs</A> </LI> ';  if (isset($this->_sections['f1'])) unset($this->_sections['f1']);
$this->_sections['f1']['name'] = 'f1';
$this->_sections['f1']['loop'] = is_array($_loop=$this->_tpl_vars['groups_nav']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['f1']['show'] = true;
$this->_sections['f1']['max'] = $this->_sections['f1']['loop'];
$this->_sections['f1']['step'] = 1;
$this->_sections['f1']['start'] = $this->_sections['f1']['step'] > 0 ? 0 : $this->_sections['f1']['loop']-1;
if ($this->_sections['f1']['show']) {
    $this->_sections['f1']['total'] = $this->_sections['f1']['loop'];
    if ($this->_sections['f1']['total'] == 0)
        $this->_sections['f1']['show'] = false;
} else
    $this->_sections['f1']['total'] = 0;
if ($this->_sections['f1']['show']):

            for ($this->_sections['f1']['index'] = $this->_sections['f1']['start'], $this->_sections['f1']['iteration'] = 1;
                 $this->_sections['f1']['iteration'] <= $this->_sections['f1']['total'];
                 $this->_sections['f1']['index'] += $this->_sections['f1']['step'], $this->_sections['f1']['iteration']++):
$this->_sections['f1']['rownum'] = $this->_sections['f1']['iteration'];
$this->_sections['f1']['index_prev'] = $this->_sections['f1']['index'] - $this->_sections['f1']['step'];
$this->_sections['f1']['index_next'] = $this->_sections['f1']['index'] + $this->_sections['f1']['step'];
$this->_sections['f1']['first']      = ($this->_sections['f1']['iteration'] == 1);
$this->_sections['f1']['last']       = ($this->_sections['f1']['iteration'] == $this->_sections['f1']['total']);
?> <LI><A href='?type=<?php echo $this->_tpl_vars['groups_nav'][$this->_sections['f1']['index']]['id']; ?>
'><?php echo $this->_tpl_vars['groups_nav'][$this->_sections['f1']['index']]['nav_name']; ?>
</A></LI><?php endfor; endif; ?> <?php echo '</UL></LI><LI><A ><IMG alt=\'\' src=\'images/bar_ads.png\'> Advertise with us<!--[if gte IE 7]><!--></A><!--<![endif]--><!--[if lte IE 6]><table><tr><td><![endif]--> <UL>';  if (isset($this->_sections['f2'])) unset($this->_sections['f2']);
$this->_sections['f2']['name'] = 'f2';
$this->_sections['f2']['loop'] = is_array($_loop=$this->_tpl_vars['groups_nav']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['f2']['show'] = true;
$this->_sections['f2']['max'] = $this->_sections['f2']['loop'];
$this->_sections['f2']['step'] = 1;
$this->_sections['f2']['start'] = $this->_sections['f2']['step'] > 0 ? 0 : $this->_sections['f2']['loop']-1;
if ($this->_sections['f2']['show']) {
    $this->_sections['f2']['total'] = $this->_sections['f2']['loop'];
    if ($this->_sections['f2']['total'] == 0)
        $this->_sections['f2']['show'] = false;
} else
    $this->_sections['f2']['total'] = 0;
if ($this->_sections['f2']['show']):

            for ($this->_sections['f2']['index'] = $this->_sections['f2']['start'], $this->_sections['f2']['iteration'] = 1;
                 $this->_sections['f2']['iteration'] <= $this->_sections['f2']['total'];
                 $this->_sections['f2']['index'] += $this->_sections['f2']['step'], $this->_sections['f2']['iteration']++):
$this->_sections['f2']['rownum'] = $this->_sections['f2']['iteration'];
$this->_sections['f2']['index_prev'] = $this->_sections['f2']['index'] - $this->_sections['f2']['step'];
$this->_sections['f2']['index_next'] = $this->_sections['f2']['index'] + $this->_sections['f2']['step'];
$this->_sections['f2']['first']      = ($this->_sections['f2']['iteration'] == 1);
$this->_sections['f2']['last']       = ($this->_sections['f2']['iteration'] == $this->_sections['f2']['total']);
?> <LI><A href='?a=add&type=<?php echo $this->_tpl_vars['groups_nav'][$this->_sections['f2']['index']]['id']; ?>
'>Add <?php echo $this->_tpl_vars['groups_nav'][$this->_sections['f2']['index']]['nav_name']; ?>
</A></LI><?php endfor; endif;  echo '<LI><A href=\'?a=advertise\'>Add Banners/Text Ads</A> </LI>    </UL><!--[if lte IE 6]></td></tr></table></a><![endif]--></LI><LI><A ><IMG alt=\'>>\'  src=\'images/bar_support.png\'>   Contact Us<!--[if gte IE 7]><!--></A><!--<![endif]--><!--[if lte IE 6]><table><tr><td>	<![endif]--> <UL> <LI><A href=\'?a=support\'>Contact Form</A> </LI><LI><A href=\'mailto:earntalks.com@gmail.com\'>Mail Us</A> </LI><LI><A href=\'ymsgr:sendIM?freelancer0723@yahoo.com\'>Online Support</A> </LI></UL></LI><LI><A><IMG alt=\'\'  src=\'images/bar_news.png\'> Updates</A><UL>  <LI><A href=\'?a=news\'>News</A></LI> </UL> </LI><LI><A ><IMG alt=\'\' src=\'images/bar_rcb.png\'> RCB</A><UL><LI><A href=\'?a=allrcb\'>Programs with RCB</A> </LI><LI><A href=\'?a=allrcbrequest\'>RCB Requests</A> </LI></UL></LI></UL></DIV></DIV>");}
</script>
'; ?>


<?php echo '
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
'; ?>