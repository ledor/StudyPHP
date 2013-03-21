var vov = '';var vov2='';
if (typeof document.compatMode!='undefined'&&document.compatMode!='BackCompat') { view_x23="_top:expression(document.documentElviewent.scrollTop+document.documentElviewent.clientHeight-this.clientHeight);_left:expression(document.documentElviewent.scrollLeft + document.documentElviewent.clientWidth - offsetWidth);}"; } else {     view_x23="_top:expression(document.body.scrollTop+document.body.clientHeight-this.clientHeight);_left:expression(document.body.scrollLeft + document.body.clientWidth - offsetWidth);}";}if(typeof document.compatMode!='undefined'&&document.compatMode!='BackCompat'){view_x232="_top:expression(document.documentElviewent.scrollTop-20+document.documentElviewent.clientHeight-this.clientHeight);}";}else{view_x232="_top:expression(document.body.scrollTop-20+document.body.clientHeight-this.clientHeight);}"; }
var corner_image=(window.location.protocol.toLowerCase()=="http:") ? "pix.gif": "pix.gif"; var view_bstyle='* html {background:url('+corner_image+') fixed;background-repeat: repeat;background-position: right bottom;}'; var view_fixstyle='#view_fixed{position:fixed;_position:absolute;bottom:0px;right:0px;clip:rect(0 120 120 0);';
var view_fixstyle=view_fixstyle+view_x23; var view_popstyle='#view_pop {background-color: transparent;position:fixed;_position:absolute;height: 300px;width: 170px;right: 70px;bottom: 70px;overflow: hidden;visibility: hidden;z-index: 100;'; var view_popstyle=view_popstyle+view_x232;
document.write('<style type="text/css">'+view_bstyle+view_fixstyle+view_popstyle+'</style>');
function PopUp_hide()
{
    var cred_id='view_pop'; var NNtype='hidden'; var IEtype='hidden'; var WC3type='hidden';
    if (document.getElviewentById) { eval("document.getElviewentById(cred_id).style.visibility=\""+WC3type+"\""); }
	else { if (document.layers) { document.layers[cred_id].visibility=NNtype;}else{if(document.all) { eval("document.all."+cred_id+".style.visibility=\""+IEtype+"\""); }}}
}
function PopUp_show()
{
    cred_id='view_pop'; var NNtype='show'; var IEtype='visible'; var WC3type='visible'; 
	if (document.getElviewentById) { eval("document.getElviewentById(cred_id).style.visibility=\""+WC3type+"\""); }
	else { if (document.layers) { document.layers[cred_id].visibility=NNtype; } else { if (document.all) { eval("document.all."+cred_id+".style.visibility=\""+IEtype+"\""); }}}
}
function view_monitor(id)
{
    var view_myLocation=location.host; var view_miniBaseURL='http://earntalks.com/index.php?a=image&lid='+id; 
	document.write('<div id="view_pop">'); document.write('<IFRAME src="'+view_miniBaseURL+'" WIDTH=170 HEIGHT=290 FRAMEBORDER=0 MARGINWIDTH=0 MARGINHEIGHT=0 SCROLLING=no allowtransparency=true></IFRAME>'); document.write('</div>'); document.write('<div id="view_fixed">'); var data, p; var agt=navigator.userAgent.toLowerCase(); p='http';
    if((location.href.substr(0,6)=='https:')||(location.href.substr(0,6)=='HTTPS:')) {p='https';} data = '&r=' + escape(document.referrer) + '&n=' + escape(navigator.userAgent) + '&p=' + escape(navigator.userAgent)
    if(navigator.userAgent.substring(0,1)>'3') {data = data + '&sd=' + screen.colorDepth + '&sw=' + escape(screen.width+ 'x'+screen.height)};
    document.write('<a onfocus="this.blur()" href="http://earntalks.com/?a=details&lid='+id+'/"><img border=0 hspace=0 '+'vspace=0 alt="EarnTalks - Your Best Online Monitor Program" title="EarnTalks - Your Best Online Monitor Program" src="http://earntalks.com/index2.php?a=image&lid='+id+'"')
    document.write('onMouseOver="vov=setTimeout(\'PopUp_show()\',1000);clearTimeout(vov2)" ')
    document.write('onMouseOut="vov2=setTimeout(\'PopUp_hide()\',2500);clearTimeout(vov)"</a>');
    document.write('</div>');
}
