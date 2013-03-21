

/* Browser Window Size and Position */

function pageWidth() { 

  return window.innerWidth != null ? window.innerWidth : document.documentElement && document.documentElement.clientWidth ? document.documentElement.clientWidth : document.body != null ? document.body.clientWidth : null;

}



function pageHeight() {

  return window.innerHeight != null ? window.innerHeight : document.documentElement && document.documentElement.clientHeight ? document.documentElement.clientHeight : document.body != null ? document.body.clientHeight : null;

}



function posLeft() {

  return typeof window.pageXOffset != 'undefined' ? window.pageXOffset : document.documentElement && document.documentElement.scrollLeft ? document.documentElement.scrollLeft : document.body.scrollLeft ? document.body.scrollLeft : 0;

}



function posTop() {

  return typeof window.pageYOffset != 'undefined' ? window.pageYOffset : document.documentElement && document.documentElement.scrollTop ? document.documentElement.scrollTop : document.body.scrollTop ? document.body.scrollTop : 0;

}



function posRight() {

  return posLeft() + pageWidth();

}



function posBottom() {

  return posTop() + pageHeight();

}



/* Mouse Position */

function getNsMouseXY(e) {

  if (document.getElementById && !document.all) {

    nsmousepos.pageX = e.pageX;

    nsmousepos.pageY = e.pageY;

    nsmousepos.clientX = e.clientX;

    nsmousepos.clientY = e.clientY; 

  }

}



function ietruebody() {

  return (document.compatMode && document.compatMode != 'BackCompat') ? document.documentElement : document.body;

}



function getMouseX() {

  return (document.getElementById && ! document.all) ? nsmousepos.pageX : event.x + ietruebody().scrollLeft;

}



function getMouseY() {

  return (document.getElementById && ! document.all) ? nsmousepos.pageY : event.y + ietruebody().scrollTop;

}



/* Show alexa preview */

function showPic( item_url ) {

  var picMouseMarginX = 20;

  var picMouseMarginY = 40;



  var myDiv = document.getElementById( 'divPic' );



  var x = getMouseX() + picMouseMarginX;

  var y = getMouseY() - picMouseMarginY;



  if ( myDiv.style.visibility == 'hidden' ) {

    myDiv.style.visibility = 'visible';

    myDiv.innerHTML = '<img src="http://pthumbnails.alexa.com/image_server.cgi?size=big&amp;url='+item_url+'">';

  }



  y = ( y < 0 ) ? 0 : y;

  myDiv.style.top  = y + 'px';

  myDiv.style.left = x + 'px';

}

/* Show rate banner */

function showMonitor3( item_id ) {

  var rateBannerWidth = 130;

  var rateBannerHeight = 150;

  var rateBannerMouseMarginX = 50;

  var rateBannerMouseMarginY = 80;

  var x = 0;

  var y = 0;

  

  var myDiv = document.getElementById( 'divPic' );

  

  var mouseX = getMouseX();

  var maxPosRight = mouseX + rateBannerWidth + rateBannerMouseMarginX;

  if ( maxPosRight > posRight() ) {

    x = mouseX - rateBannerWidth - rateBannerMouseMarginX;

  } else {

    x = mouseX + rateBannerMouseMarginX;

  }

  

  var mouseY = getMouseY();

  var maxPosTop = mouseY - rateBannerMouseMarginY;

  var maxPosBottom = mouseY + rateBannerHeight - rateBannerMouseMarginY;

  if ( maxPosTop < posTop() ) {

    y = posTop() + 2;

  } else if ( maxPosBottom > posBottom() ) {

    y = posBottom() - rateBannerHeight - 2;

  } else {

    y = mouseY - rateBannerMouseMarginY;

  }

  

  if ( myDiv.style.visibility == 'hidden' ) {

    myDiv.style.visibility = 'visible';

    var timestamp =  new Date().getTime();


    myDiv.innerHTML = '<IFRAME src="http://a.investment-profits.com/list/?a=image_3&cmd=table&lid='+item_id+'" WIDTH=155 HEIGHT=270 FRAMEBORDER=0 MARGINWIDTH=0 MARGINHEIGHT=0 SCROLLING=no allowtransparency=true></IFRAME>';

  }



  y = ( y < 0 ) ? 0 : y;

  myDiv.style.top  = y + 'px';

  myDiv.style.left = x + 'px';

}


/* Show rate banner */

function showBan( item_id ) {

  var rateBannerWidth = 130;

  var rateBannerHeight = 150;

  var rateBannerMouseMarginX = 20;

  var rateBannerMouseMarginY = 40;

  var x = 0;

  var y = 0;

  

  var myDiv = document.getElementById( 'divPic' );

  

  var mouseX = getMouseX();

  var maxPosRight = mouseX + rateBannerWidth + rateBannerMouseMarginX;

  if ( maxPosRight > posRight() ) {

    x = mouseX - rateBannerWidth - rateBannerMouseMarginX;

  } else {

    x = mouseX + rateBannerMouseMarginX;

  }

  

  var mouseY = getMouseY();

  var maxPosTop = mouseY - rateBannerMouseMarginY;

  var maxPosBottom = mouseY + rateBannerHeight - rateBannerMouseMarginY;

  if ( maxPosTop < posTop() ) {

    y = posTop() + 2;

  } else if ( maxPosBottom > posBottom() ) {

    y = posBottom() - rateBannerHeight - 2;

  } else {

    y = mouseY - rateBannerMouseMarginY;

  }

  

  if ( myDiv.style.visibility == 'hidden' ) {

    myDiv.style.visibility = 'visible';

    var timestamp =  new Date().getTime();

    myDiv.innerHTML = '<img src="index.php?a=image&lid='+item_id+'">';

  }



  y = ( y < 0 ) ? 0 : y;

  myDiv.style.top  = y + 'px';

  myDiv.style.left = x + 'px';

}



/* Hide image */

function hideImg() {

  var myDiv = document.getElementById( 'divPic' );

  myDiv.style.visibility = 'hidden';

  myDiv.innerHTML = '';

}



/* Start global section */

if (document.getElementById && !document.all) {

  var nsmousepos = new Object();

  nsmousepos.pageX = 0;

  nsmousepos.pageY = 0;

  nsmousepos.clientX = 0;

  nsmousepos.clientY = 0;

}



document.onmousemove = getNsMouseXY;



