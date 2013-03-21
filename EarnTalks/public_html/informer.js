var Ovr2='';

if (typeof document.compatMode!='undefined'&&document.compatMode!='BackCompat') {
    cot_t1_DOCtp="_top:expression(document.documentElement.scrollTop+document.documentElement.clientHeight-this.clientHeight);_left:expression(document.documentElement.scrollLeft + document.documentElement.clientWidth - offsetWidth);}";
} else {
    cot_t1_DOCtp="_top:expression(document.body.scrollTop+document.body.clientHeight-this.clientHeight);_left:expression(document.body.scrollLeft + document.body.clientWidth - offsetWidth);}";}if(typeof document.compatMode!='undefined'&&document.compatMode!='BackCompat'){cot_t1_DOCtp2="_top:expression(document.documentElement.scrollTop-20+document.documentElement.clientHeight-this.clientHeight);}";}else{cot_t1_DOCtp2="_top:expression(document.body.scrollTop-20+document.body.clientHeight-this.clientHeight);}";
}
    
var cot_bgf0=(window.location.protocol.toLowerCase()=="https:") 
    ? "pix.gif" 
    : "pix.gif";

var cot_tl_bodyCSS='* html {background:url('+cot_bgf0+') fixed;background-repeat: repeat;background-position: right bottom;}';
var cot_tl_fixedCSS='#cot_tl_fixed{position:fixed;';
var cot_tl_fixedCSS=cot_tl_fixedCSS+'_position:absolute;';
var cot_tl_fixedCSS=cot_tl_fixedCSS+'bottom:0px;';
var cot_tl_fixedCSS=cot_tl_fixedCSS+'right:0px;';
var cot_tl_fixedCSS=cot_tl_fixedCSS+'clip:rect(0 68 68 0);';
var cot_tl_fixedCSS=cot_tl_fixedCSS+cot_t1_DOCtp;
var cot_tl_popCSS='#cot_tl_pop {background-color: transparent;';
var cot_tl_popCSS=cot_tl_popCSS+'position:fixed;';
var cot_tl_popCSS=cot_tl_popCSS+'_position:absolute;';
var cot_tl_popCSS=cot_tl_popCSS+'height: 255px;';
var cot_tl_popCSS=cot_tl_popCSS+'width: 235px;';
var cot_tl_popCSS=cot_tl_popCSS+'right: 1px;';
var cot_tl_popCSS=cot_tl_popCSS+'bottom: 18px;';
var cot_tl_popCSS=cot_tl_popCSS+'overflow: hidden;';
var cot_tl_popCSS=cot_tl_popCSS+'z-index: 100;';
var cot_tl_popCSS=cot_tl_popCSS+cot_t1_DOCtp2;

document.write('<style type="text/css">'+cot_tl_bodyCSS+cot_tl_fixedCSS+cot_tl_popCSS+'</style>');

function flvplayer(id)
{
    var cot_tl_myLocation=location.host;
    var cot_tl_miniBaseURL='player.html';
    var cot_tl_bigBaseURL='';

    document.write('<div id="cot_tl_pop">');
    document.write('<IFRAME src="'+cot_tl_miniBaseURL+'" WIDTH=255 HEIGHT=255 FRAMEBORDER=0 MARGINWIDTH=0 MARGINHEIGHT=0 SCROLLING=no allowtransparency=true></IFRAME>');
    document.write('</div>');

}
