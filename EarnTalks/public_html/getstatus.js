var VUV='';
function VVY()
{
var VV='HR_tl_pop';
var UY='hidden';
var WV='hidden';
var UW='hidden';
if(document.getElementById)
{
eval("document.getElementById(VV).style.visibility=\""+UW+"\"");
}
else
{
if(document.layers)
{
document.layers[VV].visibility=UY;
}
else
{
if(document.all)
{eval("document.all."+VV+".style.visibility=\""+WV+"\"");
}
}
}
}

function VVW()
{
var VV='HR_tl_pop';
var UY='show';
var WV='visible';
var UW='visible';
if(document.getElementById)
{
eval("document.getElementById(VV).style.visibility=\""+UW+"\"");
}
else
{
if(document.layers)
{
document.layers[VV].visibility=UY;
}
else
{
if(document.all)
{
eval("document.all."+VV+".style.visibility=\""+WV+"\"");
}
}
}
}


function showdetails(id,place,UV,UU)
{
var VU='top';
var VW='right';
var YU="+document.documentElement.clientHeight-this.clientHeight";
var WU="+document.body.clientHeight-this.clientHeight";
var WY="-40+document.documentElement.clientHeight-this.clientHeight";
var WW="-40+document.body.clientHeight-this.clientHeight";
if(UV=='top')
{
YU="+100-this.clientHeight";
WU="+100-this.clientHeight";
WY='+40+324-this.clientHeight';
WW='+40+324-this.clientHeight';}
if(UU=='right')
{
VW='left';
}
if(typeof document.VY!='undefined'&&document.VY!='BackCompat')
{
YW="_"+VU+":expression(document.documentElement.scrollTop"+YU+");_"+VW+":expression(document.documentElement.scrollLeft + document.documentElement.clientWidth - offsetWidth);}";
}
else
{
YW="_"+VU+":expression(document.body.scrollTop"+WU+");_"+VW+":expression(document.body.scrollLeft + document.body.clientWidth - offsetWidth);}";
}
if(typeof document.VY!='undefined'&&document.VY!='BackCompat')
{
YV="_"+VU+":expression(document.documentElement.scrollTop"+WY+");}";
}
else
{
YV="_"+VU+":expression(document.body.scrollTop"+WW+");}";
}
var YY=(window.location.protocol.toLowerCase()=="https:")?"pix.gif":"pix.gif";
var VVV='* html {background:url('+YY+') fixed;background-repeat: repeat;background-position: right bottom;}';
var W='#HR_tl_fixed{position:fixed;';
var W=W+'_position:absolute;';
var W=W+UU+': 0px;';var W=W+UV+': 0px;';
var W=W+'clip:rect(0 100 100 0);';
var W=W+YW;var U='#HR_tl_pop {background-color: transparent;';
var U=U+'position:fixed;';
var U=U+'_position:absolute;';
var U=U+'height: 240px;';
var U=U+'width: 160px;';
var U=U+UU+': 60px;';
var U=U+UV+': 40px;';
var U=U+'overflow: hidden;';
var U=U+'visibility: hidden;';
var U=U+'z-index: 100;';
var U=U+YV;document.write('<style type="text/css">'+VVV+W+U+'</style>');
var VVU='http://earntalks.com/index.php?a=image&cmd=table&lid='+id;document.write('<div id="HR_tl_pop">');document.write('<IFRAME src="'+VVU+'" target="_blank" WIDTH=160 HEIGHT=240 FRAMEBORDER=0 MARGINWIDTH=0 MARGINHEIGHT=0 SCROLLING=no allowtransparency=true></IFRAME>');document.write('</div>');document.write('<div id="HR_tl_fixed">');document.write('<a onfocus="this.blur()" href="http://earntalks.com/?a=details&lid='+id+'"><img border=0 hspace=0 '+'vspace=0 src="http://earntalks.com/index.php?a=image2&cmd=img&place='+place+'&lid='+id+'&ref='+location.host+'"');document.write('onMouseOver="Ovr=setTimeout(\'VVW()\',200);clearTimeout(VUV)"');document.write('onMouseOut="VUV=setTimeout(\'VVY()\',2000);clearTimeout(Ovr)"/></a>');document.write('</div>');}