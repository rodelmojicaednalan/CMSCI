function shownotif(type, text, layout = "bottomRight"){
		new Noty({
			type: type, /*alert, information, error, warning, notification, success*/
			timeout: 3000,
	    layout: layout,
	    theme: "metroui",
			text: text
		}).show();
}


function download(file) {
    var iframe = document.getElementById('invisible');
    iframe.src = file;
}

function ssoLogin(username, password){
  document.getElementById('e-marketing-iframe').contentWindow.postMessage(username+'|'+password,'*');
}

function _get(parameter) {
    var reg = new RegExp( '[?&]' + parameter + '=([^&#]*)', 'i' );
    var string = reg.exec(window.location.href);
    return string ? string[1] : undefined;
};
