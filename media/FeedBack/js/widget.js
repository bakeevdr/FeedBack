$(document).ready ( function(){
	if(FBOptions) {
		var FBOpt = FBOptions;
		var CSS;
		CSS =	".FB_tab_cont{ box-shadow: 1px 1px 1px rgba(255, 255, 255, 0.247) inset, 0 1px 3px rgba(0, 0, 0, 0.498); height: 29px;overflow: hidden;background-color: #425E85;z-index: 100001;position: fixed;right: 0px;top:200px;border-radius: 5px 0 0 5px;}";
		CSS +=	".FB_tab_cont:hover{height: auto;animation-name: none;}";
		CSS +=	".FB_tab_cont>img:hover {position: static;}";
		CSS +=	".FB_tab_cont>img {bottom: 140px;position: relative;}";
		CSS +=	".FB_tab_cont{animation: background 3s infinite alternate;}";
		CSS +=	"@keyframes background {50% {background: skyblue;box-shadow: 0 -200px 100px -100px yellowgreen inset;}}";
		CSS +=	"#FB_overlay {filter:progid:DXImageTransform.Microsoft.Alpha(opacity=60);-moz-opacity: 0.6;-khtml-opacity: 0.6;opacity: 0.6; background: #000 none repeat scroll 0 0; height: 100%; left: 0; position: fixed; top: 0; width: 100%; z-index: 100002;}";
		CSS +=	"#FB_widget {background: #ececec none repeat scroll 0 0;border-radius: 6px;height: 520px;left: 50%;margin: -260px 0 0 -385px;position: fixed;top: 50%;width: 770px;z-index: 100003;}";
		CSS +=	".FB_header { border-bottom: 1px solid #e5e5e5; padding: 0 20px;}";
		CSS +=	".FB_header .FB_close {border: 0 none; cursor: pointer; padding: 0; color: #000;float: right;font-size: 21px;font-weight: 700;line-height: 1;opacity: 0.2;text-shadow: 0 1px 0 #fff;}";
		CSS +=	".FB_header .FB_title {color: inherit; font-family: inherit; font-weight: 500;}";
	
		FB_CSS = document.createElement("style");
		FB_CSS.setAttribute("type", "text/css");
		FB_CSS.setAttribute("media", "screen");
		if(FB_CSS.styleSheet) {
			FB_CSS.styleSheet.cssText = CSS
		} else {
			FB_CSS.appendChild(document.createTextNode(CSS))
		};
		document.getElementsByTagName("head")[0].appendChild(FB_CSS);
		
		FB_tab = document.createElement("a");
		FB_tab.setAttribute("id", "FB_tab");
		FB_tab.setAttribute("href", "#");
		FB_tab.setAttribute("class", "FB_tab_cont");
		FB_tab.setAttribute("onclick", "FB_widgetOpen();");
		FB_tab.innerHTML = '<img src="http://test1/media/Feedback/images/widgettab.png">';
		document.body.insertBefore(FB_tab, document.body.firstChild);
		
		FB_overlay = document.createElement("div");
		FB_overlay.setAttribute("id", "FB_overlay");
		FB_overlay.setAttribute("onclick", "FB_widgetClose();");
		FB_overlay.setAttribute("style", "display: none;");
		document.body.insertBefore(FB_overlay, document.body.firstChild);
		
		FB_widget = document.createElement("div");
		FB_widget.setAttribute("id", "FB_widget");
		FB_widget.setAttribute("style", "display: none;");
		FB_widget.innerHTML = '<div class="FB_header"><button type="button" class="FB_close" onclick="FB_widgetClose();">×</button><h4 class="FB_title">Оставьте свой отзыв</h4></div><iframe src="http://test1/widget?project='+FBOpt.project+'" frameborder="0" scrolling="no" width="100%" height="100%"></iframe>';
		document.body.insertBefore(FB_widget, document.body.firstChild);
	}

});

function FB_widgetClose() {
	FB_overlay.style.display = "none";
	FB_widget.style.display = "none";
};
function FB_widgetOpen() {
	FB_overlay.style.display = "block";
	FB_widget.style.display = "block";
};
