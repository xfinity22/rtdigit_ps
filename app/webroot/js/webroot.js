	
	
	function getTheWebroot(){
		return ("https:"==document.location.protocol?"https://":"http://") + document.location.hostname + "/RTDIGIT/BICOL/dashboard/";
	}

	var _webroot = getTheWebroot();
	
	